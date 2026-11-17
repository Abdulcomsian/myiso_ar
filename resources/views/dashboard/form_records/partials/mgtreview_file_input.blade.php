{{-- The file field on a Management Review, with the hint beside it.

     This is the Arabic site's own file widget - the one the QMS Audit, the
     Objectives Tracker and Add User already use - rather than the browser's
     English "Choose file".

     $id        unique per copy of the form
     $name      the field name
     $accept    the extensions the form asks for
     $hint      the line of help beside it
     $multiple  true for the meeting files, which take several at once
     $label     optional heading above it, e.g. Attach Supporting Evidence
     $note      optional grey words after that heading
--}}
@if (!empty($label))
    <label>{{ $label }}@if (!empty($note)) <span style="color:var(--am-text-soft);font-weight:500;text-transform:none;letter-spacing:0;">{{ $note }}</span>@endif</label>
@endif
<div class="mr-attach">
    <div class="custom-file-input-tag form-control">
        <input type="file" id="{{ $id }}" class="input-file" name="{{ $name }}" accept="{{ $accept }}" {{ !empty($multiple) ? 'multiple' : '' }}/>
        <label for="{{ $id }}" class="file-label">
            <span class="file-text">{{ !empty($multiple) ? 'اختيار الملفات' : 'اختيار الملف' }}</span>
            <span class="file-chosen">{{ !empty($multiple) ? 'لم يتم اختيار ملفات' : 'لم يتم اختيار ملف' }}</span>
        </label>
    </div>
    <span class="mr-attach__hint">{{ $hint }}</span>
</div>
