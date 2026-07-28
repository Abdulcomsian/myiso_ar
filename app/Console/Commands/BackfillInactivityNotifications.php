<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Carbon\Carbon;
use DB;
use Log;

class BackfillInactivityNotifications extends Command
{
    protected $signature = 'Notification:Backfill
                            {--dry-run : Preview what would be inserted without writing to the database}';

    protected $description = 'Backfill send_notification records for all inactive users with historically accurate created_at/updated_at timestamps';

    // The same user excluded from the live scheduler
    private const EXCLUDE_USER_ID = 1011;

    // Thresholds in days → Arabic label used in the title
    private const THRESHOLDS = [
        90  => '3 أشهر',
        180 => '6 أشهر',
        300 => '10 أشهر',
    ];

    public function handle()
    {
        $dryRun = $this->option('dry-run');

        if ($dryRun) {
            $this->warn('=== وضع المعاينة (Dry-run) — لن يُكتب أي شيء إلى قاعدة البيانات ===');
        }

        $users = User::whereNotNull('last_login')
            ->where('last_login', '<=', Carbon::now()->subDays(90))
            ->where('id', '!=', self::EXCLUDE_USER_ID)
            ->get();

        $this->info("إجمالي المستخدمين المؤهلين: {$users->count()}");

        $inserted = 0;
        $skipped  = 0;

        foreach ($users as $u) {
            try {
                $lastLogin    = Carbon::parse($u->last_login);
                $daysInactive = (int) $lastLogin->diffInDays(Carbon::now());

                foreach (self::THRESHOLDS as $days => $label) {
                    // User hasn't been inactive long enough for this threshold yet
                    if ($daysInactive < $days) {
                        continue;
                    }

                    // Dedup: skip if this threshold was already recorded for the current
                    // inactivity period (i.e., after the user's last login).
                    $alreadyExists = DB::table('send_notification')
                        ->where('send_to', $u->id)
                        ->where('total_days', $days)
                        ->where('created_at', '>', $u->last_login)
                        ->exists();

                    if ($alreadyExists) {
                        $this->line("  تخطّي — User #{$u->id} | {$days} يوم — سجل موجود مسبقاً");
                        $skipped++;
                        continue;
                    }

                    // The historical timestamp: the exact moment the threshold was crossed.
                    $historicalDate = $lastLogin->copy()->addDays($days);

                    $title = 'لم تقم بتسجيل الدخول منذ ' . $label;

                    if ($dryRun) {
                        $this->line(
                            "  [معاينة] User #{$u->id} ({$u->name}) | {$days} يوم" .
                            " | created_at: {$historicalDate->toDateTimeString()}"
                        );
                    } else {
                        $randomInt = unpack('L', random_bytes(4))[1];

                        DB::table('send_notification')->insert([
                            'title'      => $title,
                            'send_by'    => self::EXCLUDE_USER_ID,
                            'send_to'    => $u->id,
                            'unique_id'  => intval(microtime(true) + $randomInt),
                            'total_days' => $days,
                            'created_at' => $historicalDate,
                            'updated_at' => $historicalDate,
                        ]);

                        $this->line(
                            "  ✓ تم الإدراج — User #{$u->id} ({$u->name}) | {$days} يوم" .
                            " | created_at: {$historicalDate->toDateTimeString()}"
                        );
                    }

                    $inserted++;
                }
            } catch (\Exception $e) {
                Log::error('BackfillInactivityNotifications error for User #' . $u->id . ': ' . $e->getMessage());
                $this->error("  خطأ — User #{$u->id}: {$e->getMessage()}");
            }
        }

        $action = $dryRun ? 'ستُدرج' : 'تم إدراج';
        $this->info("\nاكتمل: {$action} {$inserted} سجل | تخطّي {$skipped} سجل موجود.");

        return 0;
    }
}
