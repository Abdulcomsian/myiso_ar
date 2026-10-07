<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $table = 'tbl_objectives';

    /**
     * The five states an objective can be in.
     *
     * The keys match the English site exactly; only the wording differs. 'chip' is the colour the list and
     * the history use; the plain one is the grey "nothing has happened yet".
     */
    public static function statuses()
    {
        return [
            'not_started'  => ['label' => 'لم يبدأ',        'chip' => 'neutral',        'means' => 'تم الاتفاق عليه، لكن العمل لم يبدأ بعد.'],
            'on_track'     => ['label' => 'يسير وفق الخطة', 'chip' => 'success', 'means' => 'التقدم في المستوى المطلوب لتحقيق الموعد النهائي.'],
            'at_risk'      => ['label' => 'في خطر',        'chip' => 'warning', 'means' => 'متأخر عن الخطة. وضّح ما ستفعله للحاق بها.'],
            'achieved'     => ['label' => 'محقَّق',         'chip' => 'info',    'means' => 'تم بلوغ المستهدف. أرفِق النتيجة النهائية كدليل.'],
            'not_achieved' => ['label' => 'غير محقَّق',     'chip' => 'danger',  'means' => 'انقضى الموعد النهائي دون بلوغ المستهدف. ناقِشه في مراجعة الإدارة.'],
        ];
    }

    /** how long an objective may go without a progress note before it is chased */
    const STALE_DAYS = 90;

    public static function statusLabel($key)
    {
        return self::statuses()[$key]['label'] ?? $key;
    }

    public static function statusChip($key)
    {
        return self::statuses()[$key]['chip'] ?? '';
    }

    /** every progress note, newest first */
    public function updates()
    {
        return $this->hasMany(ObjectiveUpdate::class, 'objective_id')
                    ->orderByDesc('update_date')->orderByDesc('id');
    }

    /** the most recent progress note, or null when none has been added yet */
    public function latestUpdate()
    {
        return $this->updates()->first();
    }

    /** true when nothing has been recorded for STALE_DAYS, so it needs chasing */
    public function updateIsDue()
    {
        if (in_array($this->status, ['achieved', 'not_achieved'], true)) {
            return false;                       // finished, nothing left to chase
        }
        $last = $this->latestUpdate();
        $since = $last ? ($last->update_date ?: $last->created_at) : $this->created_at;
        if (!$since) {
            return false;
        }
        return strtotime($since) < strtotime('-' . self::STALE_DAYS . ' days');
    }
}
