@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <div class="am-page-header">
            <div>
                <h2>{{ $module['title'] }}</h2>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <div class="am-card" style="padding:16px 20px;margin-bottom:16px;background:rgba(46,59,154,0.04);border:1px solid rgba(46,59,154,0.12);">
                        <div style="display:flex;gap:12px;align-items:flex-start;">
                            <span style="width:36px;height:36px;flex-shrink:0;border-radius:10px;background:var(--am-primary-tint);color:var(--am-primary);display:inline-flex;align-items:center;justify-content:center;font-size:15px;">
                                <i class="fa fa-info-circle"></i>
                            </span>
                            <div style="font-size:13px;color:var(--am-text);line-height:1.55;">
                                <p>{{ $module['subtitle'] }}</p>
                                <p>
                                <strong>{{ $module['info_title'] }}</strong>
                                {{ implode('، ', $module['info_items']) }}.
                                لإضافة سجل، يرجى النقر على زر "{{ $module['add_label'] }}".
                                </p>
                            </div>
                        </div>
                    </div>

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

                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                {{-- customerReview() (foot.blade.php) toggles .customer_review_from_div --}}
                                <a onclick="customerReview()" class="am-btn am-btn-primary">{{ $module['add_label'] }}</a>
                            </div>
                        </div>
                        <div class="customer_review_from_div" @if (old('_form') === 'add') style="display:block;" @endif>
                            <form method="POST" action="{{ route($module['key'].'.store') }}">
                                @csrf
                                <input type="hidden" name="_form" value="add">
                                @include('dashboard.form_records.partials.register_fields', ['mode' => 'add', 'bootstrap' => true])
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button class="am-btn am-btn-outline" type="reset" onclick="customerReview()">يلغي</button>
                                    <button class="am-btn am-btn-primary" type="submit">حفظ</button>
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
                                            <tr><td colspan="{{ count($module['columns']) + 2 }}" class="text-center"><span class="am-cell-primary">{{ $module['empty'] }}</span></td></tr>
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
    <div class="modal fade text-right" id="regViewModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تفاصيل {{ $module['item_name'] }}</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></a>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit modal --}}
    <div class="modal fade text-right" id="regEditModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $module['edit_title'] }}</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route($module['key'].'.update') }}">
                        @csrf
                        <input type="hidden" name="id">
                        @include('dashboard.form_records.partials.register_fields', ['mode' => 'edit', 'bootstrap' => true])
                        <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                            <button class="am-btn am-btn-outline" type="button" data-dismiss="modal">يلغي</button>
                            <button class="am-btn am-btn-primary" type="submit">تحديث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete modal --}}
    <div class="modal fade modal-mini modal-primary" id="regDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route($module['key'].'.destroy') }}" method="post">
                    @csrf
                    <div class="modal-header text-right">
                        <div class="modal-profile">حذف {{ $module['item_name'] }}</div>
                    </div>
                    <div class="modal-body text-center">
                        <p>هل أنت متأكد أنك تريد إزالة هذا؟</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="regDeleteId">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                        <button type="submit" class="btn btn-danger">نعم</button>
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
