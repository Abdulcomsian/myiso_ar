{{--
    One audit question, as the client drew it: the number, the question, the
    standards it covers, the "what to check" / "when to tick" panels, the
    answer, and the evidence.

    $q        the question, from App\QmsAuditQuestions
    $answers  what was answered last time, keyed by question number
    $notes    the evidence written against each question, likewise
    $prefix   'add' or 'edit' - the form this copy belongs to, so the file
              picker's id is unique across the two copies of the question

    The panels open in place on every question - the client chose that over
    the overlay. Same markup as the English site; only the wording differs.
--}}
@php
    $qNo      = $q['no'];
    $prev     = $answers[$qNo] ?? null;
    $prevNote = $notes[$qNo] ?? '';
    $fileId   = 'qmsFile' . ($prefix ?? 'add') . $qNo;
@endphp

<div class="qms-question" data-qms-q="{{ $qNo }}">

    <div class="qms-question__head">
        <span class="qms-question__no">{{ $qNo }}</span>
        <div class="qms-question__title">{{ $q['title'] }}</div>
        <button type="button" class="am-page-guide-btn qms-guide-toggle"
            title="ما الذي يجب التحقق منه في السؤال {{ $qNo }}"
            aria-label="ما الذي يجب التحقق منه في السؤال {{ $qNo }}"><i class="fa fa-info-circle"></i></button>
        <div class="qms-question__badges">
            @foreach ($q['badges'] as $badge)
                <span class="am-chip {{ App\QmsAuditQuestions::badgeChips()[$badge] ?? '' }}">{{ $badge }}</span>
            @endforeach
        </div>
    </div>

    <div class="qms-guide">
        @include('dashboard.form_records.partials.qms_question_panels', ['q' => $q])
    </div>

    <div class="qms-question__answer">
        <label><input type="radio" name="q[{{ $qNo }}]" value="Yes" {{ $prev === 'Yes' ? 'checked' : '' }}> نعم</label>
        <label><input type="radio" name="q[{{ $qNo }}]" value="No" {{ $prev === 'No' ? 'checked' : '' }}> لا</label>
        @if ($q['tick_na'])
            <label><input type="radio" name="q[{{ $qNo }}]" value="NA" {{ $prev === 'NA' ? 'checked' : '' }}> لا ينطبق</label>
        @endif
    </div>

    {{-- The answer in the auditor's own words, and the file that proves it. --}}
    <div class="qms-question__evidence">
        <label>الدليل <span style="color:var(--am-text-soft);font-weight:500;text-transform:none;letter-spacing:0;">ملف مرفق (PDF، JPEG، TXT، DOCX، PNG)</span></label>
        <textarea name="qnote[{{ $qNo }}]" rows="3" placeholder="{{ $q['eg'] }}">{{ $prevNote }}</textarea>
        {{-- the Arabic picker the rest of the forms use, wired up in foot.blade.php --}}
        <div class="custom-file-input-tag form-control">
            <input type="file" id="{{ $fileId }}" class="input-file" name="qfile[{{ $qNo }}]" accept=".pdf,.jpg,.jpeg,.txt,.doc,.docx,.png"/>
            <label for="{{ $fileId }}" class="file-label">
                <span class="file-text">اختيار الملف</span>
                <span class="file-chosen">لم يتم اختيار ملف</span>
            </label>
        </div>
    </div>
</div>
