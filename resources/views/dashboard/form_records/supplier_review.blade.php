@extends('dashboard.layouts.app')

@section('content')
    @php
        // One lookup for all rows instead of a query per row
        $supplierNames = \App\Supplier::where('user_id', $userid)->pluck('suppliername', 'idnumber');
    @endphp
    <!-- begin:: Content -->
    <div class="am-content">
        <div class="am-page-header">
            <div>
                <h2>مراجعات الموردين</h2>
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
                                <p>تقييمات الموردين هي أداة لمراقبة وتصنيف أداء الموردين عبر جميع نقاط التعامل معهم، مثل: جودة المنتجات أو الخدمات، وموثوقية التسليم، وتنافسية الأسعار، والامتثال وسرعة الاستجابة.</p>
                                <p>لإضافة سجل، يرجى النقر على زر "إضافة تقييم مورد". لتعديل سجل، يرجى النقر على أيقونة التعديل الخاصة بالقيد المراد تعديله.</p>
                            </div>
                        </div>
                    </div>
                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                {{-- customerReview() (foot.blade.php) toggles .customer_review_from_div --}}
                                <a onclick="customerReview()" class="am-btn am-btn-primary">إضافة تقييم مورد</a>
                            </div>
                        </div>
                        <div class="customer_review_from_div">
                            <form method="POST" action="{{ route('supplier_review_store') }}" enctype="multipart/form-data">
                                @csrf
                                                                <div class="form-row">
                                    <div>
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
                                    <div>
                                        <div class="form-group">
                                            <label>المنتج / النشاط / المنطقة التي تتم مراجعتها</label><br>
                                            <input class="form-control" type="text" name="product_activity_area" required placeholder="أدخل المنتج / النشاط / المنطقة قيد المراجعة">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>تاريخ التقييم: (الشهر/ اليوم/ السنة):</label>
                                            <input type="date" class="form-control" max="2999-12-31" name="AssesmentDate" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>التقييم من حيث الجودة (0 – 10):</label>
                                            <input type="number" min="0" max="10" class="form-control" name="qualityScore" required="required" placeholder="يرجى إدخال النقاط المحرزة فيما يتعلق بالجودة">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>التقييم من حيث السعر: (0 – 10):</label>
                                            <input type="number" min="0" max="10" class="form-control" name="priceScore" required="required" placeholder="إذا كان قابلا للتطبيق">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>التقييم من حيث التسليم: (0 – 10):</label>
                                            <input type="number" min="0" max="10" class="form-control" name="DScore" required="required" placeholder="يرجى إدخال النقاط المحرزة فيما يتعلق بالتسليم">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>النتيجة الإجمالية (0-10):</label>
                                            <input type="number" min="0" max="10" class="form-control" name="OveralScore" required="required" placeholder="أدخل النتيجة الإجمالية">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div style="grid-column:span 2;">
                                        <div class="form-group">
                                            <label>هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟</label>
                                            <input type="text" class="form-control" name="other_issue" required="required" placeholder="هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟">
                                        </div>
                                    </div>
                                    <div style="grid-column:span 2;">
                                        <div class="form-group">
                                            <label>إرفاق الأدلة:</label>
                                            <div class="custom-file-input-tag form-control">
                                                <input type="file" id="fileInput1" class="input-file" name="attach_evidence" required="required"/>
                                                <label for="fileInput1" class="file-label">
                                                    <span class="file-text">اختيار الملف</span>
                                                    <span class="file-chosen">لم يتم اختيار ملف</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button class="am-btn am-btn-outline" type="reset" onclick="customerReview()">يلغي</button>
                                    <button class="am-btn am-btn-primary" type="submit">يُقدِّم</button>
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
                                        @forelse ($reviews as $data)
                                            <tr>
                                                <td><span class="am-cell-sub">{{ $loop->iteration }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->sup_id }}</span></td>
                                                <td><span class="am-cell-sub">{{ $supplierNames[$data->sup_id] ?? '' }}</span></td>
                                                <td><span class="am-cell-primary">{{ $data->qualityScore }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->priceScore }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->DScore }}</span></td>
                                                <td><span class="am-chip {{ ((int)$data->OveralScore) >= 8 ? 'success' : (((int)$data->OveralScore) >= 5 ? 'warning' : 'danger') }}">{{ $data->OveralScore }}</span></td>
                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($data->AssesmentDate)) }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->other_issues }}</span></td>
                                                <td>
                                                    @if ($data->attach_evidence)
                                                        <a href="{{ asset('supplier_review_evidence/' . $data->attach_evidence) }}" target="_blank">عرض الأدلة</a>
                                                    @endif
                                                </td>
                                                <td><span class="am-cell-sub">{{ $data->product_activity_area }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn" title="عرض" onclick='srView(@json($data), @json($supplierNames[$data->sup_id] ?? ""))'>
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="am-icon-btn" title="تعديل" onclick='srEdit(@json($data))'>
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                    <button class="am-icon-btn danger" title="حذف" onclick="srDelete({{ $data->id }})">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12">
                                                    <div class="am-empty">
                                                        <i class="fa fa-star"></i>
                                                        <p>لم تتم إضافة أي تقييمات موردين بعد.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $reviews])
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- View modal --}}
    <div class="modal fade text-right" id="viewSupplierRev" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:720px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                    <h5 class="modal-title am-modal__title">تفاصيل تقييم المورد</h5>
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
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit modal --}}
    <div class="modal fade text-right" id="editsupplier_rev" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:900px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title">تحرير تفاصيل تقييم المورد</h5>
                    </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('editSupplierReview') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="srEditId">
                                                <div class="form-group row">
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
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <div class="form-group"><label>التقييم من حيث الجودة: (0 – 10):</label><input type="number" min="0" max="10" required class="form-control" name="qualityScore"></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group"><label>التقييم من حيث السعر: (0 – 10):</label><input type="number" min="0" max="10" required class="form-control" name="priceScore"></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group"><label>التقييم من حيث التسليم: (0 – 10):</label><input type="number" min="0" max="10" required class="form-control" name="DScore"></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group"><label>النتيجة الإجمالية (0-10)</label><input type="number" min="0" max="10" required class="form-control" name="OveralScore"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group"><label>تاريخ التقييم: (الشهر/ اليوم/ السنة)</label><input type="date" max="2999-12-31" required class="form-control" name="AssesmentDate"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><label>هل هناك أي مشكلات أو نقاط أخرى يجب ملاحظتها؟</label><input type="text" required class="form-control" name="other_issue"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>إرفاق الأدلة:</label>
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput2" class="input-file" name="attach_evidence">
                                        <label for="fileInput2" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                            <button class="am-btn am-btn-outline" type="reset" data-dismiss="modal" aria-label="Close">يلغي</button>
                            <button class="am-btn am-btn-primary" type="submit">تحديث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete modal --}}
    <div class="modal fade modal-mini modal-primary" id="deleteSupplierRev" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="max-width:460px;">
            <div class="modal-content">
                <form action="{{ route('delete_supplier_review') }}" method="post">
                    @csrf
                    <div class="modal-header text-right am-modal__header">
                        <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                        <div class="modal-profile am-modal__title">حذف تفاصيل مراجعة المورد</div>
                    </div>
                    <div class="modal-body text-center">
                        <p>هل أنت متأكد أنك تريد إزالة هذا؟</p>
                    </div>
                    <div class="modal-footer am-modal__footer">
                        <input type="hidden" name="id" id="srDeleteId">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
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
