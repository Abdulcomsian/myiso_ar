@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <div class="am-page-header">
            <div style="display:flex;align-items:center;gap:12px;">
                <button type="button" class="am-page-guide-btn"
                    data-toggle="modal" data-target="#amPageGuide"
                    title="{{ $module['title'] }}" aria-label="{{ $module['title'] }}">
                    <i class="fa fa-info-circle"></i>
                </button>
                <div>
                    <h2>{{ $module['title'] }}</h2>
                </div>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
@if (session('msg'))
                        <div class="alert alert-success text-right">{{ session('msg') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger text-right" style="display:block;">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="am-card__toolbar">
                            <div class="text-right" style="width:100%;">
                                {{-- customerReview() (foot.blade.php) toggles .customer_review_from_div --}}
                                <a onclick="customerReview()" class="am-btn am-btn-primary">{{ $module['add_label'] }}</a>
                            </div>
                        </div>
                        <div class="customer_review_from_div" @if (old('_form') === 'add') style="display:block;" @endif>
                            <form class="am-inline-form open" method="POST" action="{{ route($module['key'].'.store') }}" style="margin:16px 20px;">
                                @csrf
                                <input type="hidden" name="_form" value="add">
                                @include('dashboard.form_records.partials.register_fields', ['mode' => 'add', 'bootstrap' => true])
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button class="am-btn am-btn-outline am-btn-sm" type="reset" onclick="customerReview()">يلغي</button>
                                    <button class="am-btn am-btn-primary am-btn-sm" type="submit">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="requirments_table_div">
                            <div class="am-table-wrap">
                                <table class="am-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            @foreach ($module['columns'] as $label)
                                                <th>{{ $label }}</th>
                                            @endforeach
                                            <th>النشاط</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($records as $row)
                                            <tr>
                                                <td><span class="am-cell-sub">{{ $loop->iteration }}</span></td>
                                                @foreach ($module['columns'] as $col => $label)
                                                    @php
                                                        $field = $module['fields'][$col];
                                                        $raw = $row->getRawOriginal($col);
                                                    @endphp
                                                    <td>
                                                        @if ($raw === null || $raw === '')
                                                            <span class="am-cell-sub">—</span>
                                                        @elseif ($field['type'] === 'date')
                                                            <span class="am-chip info">{{ \Carbon\Carbon::parse($raw)->format('d/m/Y') }}</span>
                                                        @elseif ($field['type'] === 'select')
                                                            @php $chip = $module['chips'][$col][$raw] ?? null; @endphp
                                                            @if ($chip)
                                                                <span class="am-chip {{ $chip }}">{{ $field['options'][$raw] ?? $raw }}</span>
                                                            @else
                                                                {{ $field['options'][$raw] ?? $raw }}
                                                            @endif
                                                        @elseif ($loop->first)
                                                            <span class="am-cell-primary">{{ \Illuminate\Support\Str::limit($raw, 60) }}</span>
                                                        @else
                                                            {{ \Illuminate\Support\Str::limit($raw, 60) }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn" title="عرض" onclick='regView(@json($row))'>
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="am-icon-btn" title="تعديل" onclick='regEdit(@json($row))'>
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                    <button class="am-icon-btn danger" title="حذف" onclick="regDelete({{ $row->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="{{ count($module['columns']) + 2 }}"><div class="am-empty"><i class="fa {{ $module['icon'] }}"></i><p>{{ $module['empty'] }}</p></div></td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $records])
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- View modal --}}
    {{-- Page guide --}}
    @if (!empty($module['guide']))
    @include('dashboard.form_records.partials.guides.register')
    @endif

    <div class="modal fade text-right" id="regViewModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:760px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                    <h5 class="modal-title am-modal__title">تفاصيل {{ $module['item_name'] }}</h5>
                    </div>
                <div class="modal-body">
                    <div class="row">
                        @foreach ($module['fields'] as $name => $field)
                            <div class="{{ (!empty($field['wide']) || $field['type'] === 'textarea') ? 'col-lg-12' : 'col-lg-6' }}">
                                <div class="form-group">
                                    <label>{{ $field['label'] }}:</label>
                                    <div class="form-control" id="v-reg-{{ $name }}" style="height:auto;min-height:38px;white-space:pre-wrap;background:#f7f8fa;">—</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit modal --}}
    <div class="modal fade text-right" id="regEditModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:900px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title">{{ $module['edit_title'] }}</h5>
                    </div>
                <form method="POST" action="{{ route($module['key'].'.update') }}">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id">
                        @include('dashboard.form_records.partials.register_fields', ['mode' => 'edit', 'bootstrap' => true])
                    </div>
                    <div class="modal-footer am-modal__footer">
                            <button class="am-btn am-btn-outline" type="button" data-dismiss="modal">يلغي</button>
                            <button class="am-btn am-btn-primary" type="submit">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete modal --}}
    <div class="modal fade modal-mini modal-primary" id="regDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="max-width:460px;">
            <div class="modal-content">
                <form action="{{ route($module['key'].'.destroy') }}" method="post">
                    @csrf
                    <div class="modal-header text-right am-modal__header">
                        <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                        <div class="modal-profile am-modal__title">حذف {{ $module['item_name'] }}</div>
                    </div>
                    <div class="modal-body text-center">
                        <p>هل أنت متأكد أنك تريد إزالة هذا؟</p>
                    </div>
                    <div class="modal-footer am-modal__footer">
                        <input type="hidden" name="id" id="regDeleteId">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var REG_FIELDS = @json($module['fields']);

        function regDisplay(field, value) {
            if (value === null || value === undefined || value === '') return '—';
            if (field.type === 'select') return field.options[value] || value;
            if (field.type === 'date') { var p = String(value).substring(0, 10).split('-'); return p.length === 3 ? p[2] + '/' + p[1] + '/' + p[0] : value; }
            return value;
        }

        function regView(data) {
            Object.keys(REG_FIELDS).forEach(function (k) {
                $('#v-reg-' + k).text(regDisplay(REG_FIELDS[k], data[k]));
            });
            $('#regViewModal').modal('show');
        }

        function regEdit(data) {
            var m = $('#regEditModal');
            m.find("input[name='id']").val(data.id);
            Object.keys(REG_FIELDS).forEach(function (k) {
                var v = data[k] === null || data[k] === undefined ? '' : String(data[k]);
                m.find("[name='" + k + "']").val(REG_FIELDS[k].type === 'date' ? v.substring(0, 10) : v);
            });
            m.modal('show');
        }

        function regDelete(id) {
            $('#regDeleteId').val(id);
            $('#regDeleteModal').modal('show');
        }
    </script>
@endsection
