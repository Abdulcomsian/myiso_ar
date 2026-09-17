{{--
    Form fields for a simple register.
    Params: $module, $mode ('add' | 'edit'), $bootstrap (true = user pages' Bootstrap grid, false = admin am-grid)
--}}
@php $useOld = $mode === 'add' && old('_form') === 'add'; @endphp
<div class="{{ $bootstrap ? 'row' : 'am-register-grid' }}">
    @foreach ($module['fields'] as $name => $field)
        @php
            $required = !empty($field['required']);
            $wide = !empty($field['wide']) || $field['type'] === 'textarea';
            $value = $useOld ? old($name) : '';
            $cls = ($bootstrap || $mode === 'edit') ? 'form-control' : '';
            $wrap = $bootstrap ? ($wide ? 'col-lg-12' : 'col-lg-6') : ($wide ? 'wide' : '');
        @endphp
        <div class="{{ $wrap }}">
            <div class="{{ $bootstrap ? 'form-group' : '' }}">
                <label>{{ $field['label'] }}{{ $required ? ' *' : '' }}</label>
                @if ($field['type'] === 'textarea')
                    <textarea name="{{ $name }}" class="{{ $cls }}" rows="3" maxlength="5000" placeholder="{{ $field['placeholder'] ?? '' }}" {{ $required ? 'required' : '' }}>{{ $value }}</textarea>
                @elseif ($field['type'] === 'select')
                    <select name="{{ $name }}" class="{{ $cls }}" {{ $required ? 'required' : '' }}>
                        <option value="" disabled {{ $value ? '' : 'selected' }}>اختر…</option>
                        @foreach ($field['options'] as $optValue => $optLabel)
                            <option value="{{ $optValue }}" {{ (string) $value === (string) $optValue ? 'selected' : '' }}>{{ $optLabel }}</option>
                        @endforeach
                    </select>
                @elseif ($field['type'] === 'date')
                    <input type="date" name="{{ $name }}" class="{{ $cls }}" max="2999-12-31" value="{{ $value }}" {{ $required ? 'required' : '' }}>
                @else
                    <input type="text" name="{{ $name }}" class="{{ $cls }}" maxlength="255" placeholder="{{ $field['placeholder'] ?? '' }}" value="{{ $value }}" {{ $required ? 'required' : '' }}>
                @endif
            </div>
        </div>
    @endforeach
</div>
