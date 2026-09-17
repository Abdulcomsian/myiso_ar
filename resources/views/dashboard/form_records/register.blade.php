@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-right">
                <h2>{{ $module['title'] }}</h2>
            </div>
        </div>
        <section id="procedure_section">
            <div class="row text-right">
                <div class="col-lg-12">
                    <p>{{ $module['subtitle'] }}</p>
                    <p>
                        <strong>{{ $module['info_title'] }}</strong>
                        {{ implode('، ', $module['info_items']) }}.
                        لإضافة سجل، يرجى النقر على زر "{{ $module['add_label'] }}".
                    </p>

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

                    <div class="procedure_div">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                {{-- customerReview() (foot.blade.php) toggles .customer_review_from_div --}}
                                <a onclick="customerReview()" class="addBtn">{{ $module['add_label'] }}</a>
                            </div>
                        </div>
                        <div class="customer_review_from_div" @if (old('_form') === 'add') style="display:block;" @endif>
                            <form method="POST" action="{{ route($module['key'].'.store') }}">
                                @csrf
                                <input type="hidden" name="_form" value="add">
                                @include('dashboard.form_records.partials.register_fields', ['mode' => 'add', 'bootstrap' => true])
                                <button class="submitBtn" type="submit">حفظ</button>
                                <button class="btn btn-secondary submitBtn" type="reset" onclick="customerReview()" style="margin-right: 6px;">يلغي</button>
                            </form>
                        </div>
                    </div>

                    <div class="procedure_div">
                        <div class="requirments_table_div">
                            <h4>{{ $module['title'] }}</h4>
                            <div class="kt-portlet__body">
                                <table class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive">
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
                                                <td>{{ $loop->iteration }}</td>
                                                @foreach ($module['columns'] as $col => $label)
                                                    @php
                                                        $field = $module['fields'][$col];
                                                        $raw = $row->getRawOriginal($col);
                                                    @endphp
                                                    <td>
                                                        @if ($raw === null || $raw === '')
                                                            —
                                                        @elseif ($field['type'] === 'date')
                                                            {{ \Carbon\Carbon::parse($raw)->format('d/m/Y') }}
                                                        @elseif ($field['type'] === 'select')
                                                            {{ $field['options'][$raw] ?? $raw }}
                                                        @else
                                                            {{ \Illuminate\Support\Str::limit($raw, 60) }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                                <td style="white-space:nowrap;">
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="عرض" onclick='regView(@json($row))'>
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="تعديل" onclick='regEdit(@json($row))'>
                                                        <i class="fa fa-pen" style="color:#5d78ff;"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="حذف" onclick="regDelete({{ $row->id }})">
                                                        <i class="fa fa-trash" style="color:#5d78ff;"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="{{ count($module['columns']) + 2 }}" class="text-center">{{ $module['empty'] }}</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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
                        <button class="submitBtn" type="submit">تحديث</button>
                        <button class="btn btn-secondary submitBtn" type="button" data-dismiss="modal" style="margin-right: 6px;">يلغي</button>
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
