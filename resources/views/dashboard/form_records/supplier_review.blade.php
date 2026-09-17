@extends('dashboard.layouts.app')

@section('content')
    @php
        // One lookup for all rows instead of a query per row
        $supplierNames = \App\Supplier::where('user_id', $userid)->pluck('suppliername', 'idnumber');
    @endphp
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-right">
                <h2>مراجعات الموردين</h2>
            </div>
        </div>
        <section id="procedure_section">
            <div class="row text-right">
                <div class="col-lg-12">
                    <p>تقييمات الموردين هي أداة لمراقبة وتصنيف أداء الموردين عبر جميع نقاط التعامل معهم، مثل: جودة المنتجات أو الخدمات، وموثوقية التسليم، وتنافسية الأسعار، والامتثال وسرعة الاستجابة.</p>
                    <p>لإضافة سجل، يرجى النقر على زر "إضافة تقييم مورد". لتعديل سجل، يرجى النقر على أيقونة التعديل الخاصة بالقيد المراد تعديله.</p>
                    <div class="procedure_div">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                {{-- customerReview() (foot.blade.php) toggles .customer_review_from_div --}}
                                <a onclick="customerReview()" class="addBtn">إضافة تقييم مورد</a>
                            </div>
                        </div>
                        <div class="customer_review_from_div">
                            <form method="POST" action="{{ route('supplier_review_store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>رقم تعريف المورد:</label><br>
                                            <select class="form-control" name="sup_id" required="required">
                                                <option value="" selected disabled>يرجى اختيار رقم تعريف المورد</option>
                                                @foreach ($all_suppliers as $supplier)
                                                    <option value="{{ $supplier->idnumber }}">{{ $supplier->idnumber }} — {{ $supplier->suppliername }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>المنتج / النشاط / المنطقة التي تتم مراجعتها</label><br>
                                            <input class="form-control" type="text" name="product_activity_area" required placeholder="أدخل المنتج / النشاط / المنطقة قيد المراجعة">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>التقييم من حيث الجودة (0 – 10):</label>
                                            <input type="number" min="0" max="10" class="form-control" name="qualityScore" required="required" placeholder="يرجى إدخال النقاط المحرزة فيما يتعلق بالجودة">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>التقييم من حيث السعر: (0 – 10):</label>
                                            <input type="number" min="0" max="10" class="form-control" name="priceScore" required="required" placeholder="إذا كان قابلا للتطبيق">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>التقييم من حيث التسليم: (0 – 10):</label>
                                            <input type="number" min="0" max="10" class="form-control" name="DScore" required="required" placeholder="يرجى إدخال النقاط المحرزة فيما يتعلق بالتسليم">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>النتيجة الإجمالية (0-10):</label>
                                            <input type="number" min="0" max="10" class="form-control" name="OveralScore" required="required" placeholder="أدخل النتيجة الإجمالية">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>تاريخ التقييم: (الشهر/ اليوم/ السنة):</label>
                                            <input type="date" class="form-control" max="2999-12-31" name="AssesmentDate" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟</label>
                                            <input type="text" class="form-control" name="other_issue" required="required" placeholder="هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>إرفاق الأدلة:</label>
                                            <div class="custom-file-input-tag form-control">
                                                <input type="file" id="fileInput" class="input-file" name="attach_evidence" required="required"/>
                                                <label for="fileInput" class="file-label">
                                                    <span class="file-text">اختيار الملف</span>
                                                    <span class="file-chosen">لم يتم اختيار ملف</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="submitBtn" type="submit">يُقدِّم</button>
                                <button class="btn btn-secondary submitBtn" type="reset" onclick="customerReview()" style="margin-right: 6px;">يلغي</button>
                            </form>
                        </div>
                    </div>

                    <div class="procedure_div">
                        <div class="requirments_table_div">
                            <h4>تفاصيل تقييم الموردين</h4>
                            <div class="kt-portlet__body">
                                <table class="common_table table table-striped- table-bordered table-hover table-checkable table-responsive">
                                    <thead>
                                        <tr>
                                            <th>رقم التقييم</th>
                                            <th>رقم تعريف المورد</th>
                                            <th>اسم المورد</th>
                                            <th>الجودة</th>
                                            <th>السعر</th>
                                            <th>التسليم</th>
                                            <th>الإجمالي</th>
                                            <th>تاريخ التقييم</th>
                                            <th>حالات أخرى</th>
                                            <th>إرفاق الأدلة</th>
                                            <th>المنتج / النشاط / المنطقة التي تتم مراجعتها</th>
                                            <th>النشاط</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->sup_id }}</td>
                                                <td>{{ $supplierNames[$data->sup_id] ?? '' }}</td>
                                                <td>{{ $data->qualityScore }}</td>
                                                <td>{{ $data->priceScore }}</td>
                                                <td>{{ $data->DScore }}</td>
                                                <td>{{ $data->OveralScore }}</td>
                                                <td>{{ date('d/m/Y', strtotime($data->AssesmentDate)) }}</td>
                                                <td>{{ $data->other_issues }}</td>
                                                <td>
                                                    @if ($data->attach_evidence)
                                                        <a href="{{ asset('supplier_review_evidence/' . $data->attach_evidence) }}" target="_blank">عرض الأدلة</a>
                                                    @endif
                                                </td>
                                                <td>{{ $data->product_activity_area }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="عرض" onclick='srView(@json($data), @json($supplierNames[$data->sup_id] ?? ""))'>
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="تعديل" onclick='srEdit(@json($data))'>
                                                        <i class="fa fa-pen" style="color:#5d78ff;"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="حذف" onclick="srDelete({{ $data->id }})">
                                                        <i class="fa fa-trash" style="color:#5d78ff;"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
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
    <div class="modal fade text-right" id="viewSupplierRev" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تفاصيل تقييم المورد</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6"><div class="form-group"><label>المورد:</label><input type="text" class="form-control" id="v-sr-sup" readonly></div></div>
                        <div class="col-lg-6"><div class="form-group"><label>المنتج / النشاط / المنطقة التي تتم مراجعتها</label><input type="text" class="form-control" id="v-sr-prod" readonly></div></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3"><div class="form-group"><label>الجودة:</label><input type="text" class="form-control" id="v-sr-q" readonly></div></div>
                        <div class="col-lg-3"><div class="form-group"><label>السعر:</label><input type="text" class="form-control" id="v-sr-p" readonly></div></div>
                        <div class="col-lg-3"><div class="form-group"><label>التسليم:</label><input type="text" class="form-control" id="v-sr-d" readonly></div></div>
                        <div class="col-lg-3"><div class="form-group"><label>الإجمالي:</label><input type="text" class="form-control" id="v-sr-o" readonly></div></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6"><div class="form-group"><label>تاريخ التقييم:</label><input type="date" class="form-control" id="v-sr-date" readonly></div></div>
                        <div class="col-lg-6"><div class="form-group"><label>مشكلات أخرى:</label><input type="text" class="form-control" id="v-sr-oi" readonly></div></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12"><div class="form-group"><label>إرفاق الأدلة:</label> <span id="v-sr-ev"></span></div></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit modal --}}
    <div class="modal fade text-right" id="editsupplier_rev" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تحرير تفاصيل تقييم المورد</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('editSupplierReview') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="srEditId">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم تعريف المورد:</label><br>
                                    <select class="form-control" name="sup_id" required="required">
                                        <option value="" selected disabled>يرجى اختيار رقم تعريف المورد</option>
                                        @foreach ($all_suppliers as $supplier)
                                            <option value="{{ $supplier->idnumber }}">{{ $supplier->idnumber }} — {{ $supplier->suppliername }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>المنتج / النشاط / المنطقة التي تتم مراجعتها</label><br>
                                    <input class="form-control" type="text" name="product_activity_area_edit" placeholder="أدخل المنتج / النشاط / المنطقة قيد المراجعة">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><div class="form-group"><label>التقييم من حيث الجودة: (0 – 10):</label><input type="number" min="0" max="10" required class="form-control" name="qualityScore"></div></div>
                            <div class="col-lg-6"><div class="form-group"><label>التقييم من حيث السعر: (0 – 10):</label><input type="number" min="0" max="10" required class="form-control" name="priceScore"></div></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><div class="form-group"><label>التقييم من حيث التسليم: (0 – 10):</label><input type="number" min="0" max="10" required class="form-control" name="DScore"></div></div>
                            <div class="col-lg-6"><div class="form-group"><label>النتيجة الإجمالية (0-10)</label><input type="number" min="0" max="10" required class="form-control" name="OveralScore"></div></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><div class="form-group"><label>تاريخ التقييم: (الشهر/ اليوم/ السنة)</label><input type="date" max="2999-12-31" required class="form-control" name="AssesmentDate"></div></div>
                            <div class="col-lg-6"><div class="form-group"><label>هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟</label><input type="text" required class="form-control" name="other_issue"></div></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>إرفاق الأدلة:</label>
                                    <input type="file" class="form-control" name="attach_evidence">
                                </div>
                            </div>
                        </div>
                        <button class="submitBtn" type="submit">تحديث</button>
                        <button class="btn btn-secondary submitBtn" type="reset" data-dismiss="modal" aria-label="Close" style="margin-right: 6px;">يلغي</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete modal --}}
    <div class="modal fade modal-mini modal-primary" id="deleteSupplierRev" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('delete_supplier_review') }}" method="post">
                    @csrf
                    <div class="modal-header text-right">
                        <div class="modal-profile">حذف تفاصيل مراجعة المورد</div>
                    </div>
                    <div class="modal-body text-center">
                        <p>هل أنت متأكد أنك تريد إزالة هذا؟</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="srDeleteId">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                        <button type="submit" class="btn btn-danger">نعم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function srView(data, supplierName) {
            $('#v-sr-sup').val(data.sup_id + (supplierName ? ' — ' + supplierName : ''));
            $('#v-sr-prod').val(data.product_activity_area);
            $('#v-sr-q').val(data.qualityScore);
            $('#v-sr-p').val(data.priceScore);
            $('#v-sr-d').val(data.DScore);
            $('#v-sr-o').val(data.OveralScore);
            $('#v-sr-date').val(data.AssesmentDate);
            $('#v-sr-oi').val(data.other_issues);
            var ev = $('#v-sr-ev').empty();
            if (data.attach_evidence) {
                $('<a target="_blank">عرض الأدلة المرفقة</a>')
                    .attr('href', '{{ asset('supplier_review_evidence') }}/' + data.attach_evidence)
                    .appendTo(ev);
            } else {
                ev.text('—');
            }
            $('#viewSupplierRev').modal('show');
        }

        function srEdit(data) {
            var m = $('#editsupplier_rev');
            $('#srEditId').val(data.id);
            m.find("select[name='sup_id']").val(data.sup_id);
            m.find("input[name='product_activity_area_edit']").val(data.product_activity_area);
            m.find("input[name='qualityScore']").val(data.qualityScore);
            m.find("input[name='priceScore']").val(data.priceScore);
            m.find("input[name='DScore']").val(data.DScore);
            m.find("input[name='OveralScore']").val(data.OveralScore);
            m.find("input[name='AssesmentDate']").val(data.AssesmentDate);
            m.find("input[name='other_issue']").val(data.other_issues);
            m.modal('show');
        }

        function srDelete(id) {
            $('#srDeleteId').val(id);
            $('#deleteSupplierRev').modal('show');
        }
    </script>
@endsection
