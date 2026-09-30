@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div>
                <h2>سجلات الصيانة</h2>
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
                                <p>تنفيذ فحوصات الصيانة الدورية والإصلاحات يعد أمرًا ضروريًا للحفاظ على الإنتاج والخدمة. يجب تنفيذ
                                مراجعات الصيانة داخل بيئة العمل، بما في ذلك المعدات، شهريًا، أو كل ثلاثة أشهر، أو كل ستة أشهر أو
                                سنويًا، وفقًا لحجم العمل وطبيعته.</p>
                                <p>لإضافة سجل، انقر على الزر "إضافة سجل صيانة". لتعديل سجل، انقر على رمز التحرير الخاص بالقيد المراد
                                تعديله أو حذفه.</p>
                            </div>
                        </div>
                    </div>
                    <div class="am-card" style="padding:22px;margin-bottom:16px;">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <a onclick="maintanceRecordForm()" class="am-btn am-btn-primary">إضافة سجل صيانة</a>
                            </div>
                        </div>
                        <div class="maintance_record_from_div">
                            <form action="{{ route('maintain_rec') }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>تاريخ سجل الصيانة (يوم/شهر/سنة):</label><br>
                                            <input type="date" max="2999-12-31" class="form-control" name="mrdate"
                                                required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>عنصر سجل الصيانة:</label>
                                            <input type="text" class="form-control" placeholder="أدخل اسم الكائن:"
                                                name="mritem" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>نشاط سجل الصيانة:</label>
                                            <input type="text" class="form-control" placeholder="أدخل النشاط:"
                                                name="mractivity" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>موقع الصيانة:</label>
                                            <input type="text" class="form-control" placeholder="إدخال الدولة"
                                                name="mlocation" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>ملاحظات سجل الصيانة:</label>
                                            <input type="text" class="form-control" placeholder="أدخل الملاحظة"
                                                name="mrobservation" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>إجراء سجل الصيانة:</label>
                                            <input type="text" class="form-control" placeholder="أدخل الإجراء المتخذ"
                                                name="mractions" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>تم إجراء نشاط سجل الصيانة بواسطة:</label>
                                            <input type="text" class="form-control"
                                                placeholder="أدخل اسم الشخص الذي يقوم بالصيانة" name="mractivityperofrmby"
                                                required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>دليل المرفق: <span class="text-danger"
                                                    style="color:#000 !important;">(jpeg, mp3, mp4, .xls,
                                                    doc)</span></label>
                                            {{-- <input name="attach_evidence" type="file" class="form-control"
                                                accept="all"> --}}
                                            <div class="custom-file-input-tag form-control">
                                                <input type="file" id="fileInput1" class="input-file" name="attach_evidence" accept="all"/>
                                                <label for="fileInput1" class="file-label">
                                                    <span class="file-text">اختيار الملف</span>
                                                    <span class="file-chosen">لم يتم اختيار ملف</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label> هل يوجد أي مشاكل أو نقاط أخرى ترغب في تدوينها؟</label>
                                            <textarea name="any_issues" class="form-control" placeholder="أدخل أي مشاكل أخرى:"></textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                    					<div class="form-group">
											<label>Maintenance ID Number (See table below. For amendments only):</label><br>
											<input type="number" class="form-control" name="mid">
										</div>
                    				</div> --}}
                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button type="reset" onclick="maintanceRecordForm()" class="am-btn am-btn-outline">يلغي</button>
                                    <button type="submit" class="am-btn am-btn-primary">يُقدِّم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="requirments_table_div">
                            <div class="am-table-wrap">
                                <!--begin: Datatable -->
                                <table
                                    class="am-table"
                                    id="kt_table_agent">
                                    <thead>
                                        <tr>
                                            <th>معرّف الصيانة</th>
                                            <th>التاريخ</th>
                                            <th>العنصر</th>
                                            <th>النشاط</th>
                                            <th>الموقع</th>
                                            <th>ملاحظات</th>
                                            <th>الإجراءات</th>
                                            <th> تم بواسطة</th>
                                            <th>الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody> @php $number = 1; @endphp
                                        @forelse ($userinfo as $data)
                                            <tr>
                                                <td><span class="am-cell-sub">{{ $number }}</span></td>
                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($data->mrdate)) }}</span></td>
                                                <td><span class="am-cell-primary">{{ $data->mritem }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->mractivity }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->mlocation }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->mrobservation }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->mractions }}</span></td>
                                                <td><span class="am-cell-sub">{{ $data->mractivityperofrmby }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button onclick="viewRecord({{ json_encode($data) }});"
                                                        class="am-icon-btn" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button onclick="getEid({{ json_encode($data) }});"
                                                        class="am-icon-btn"
                                                        title="Edit"><i class="fa fa-pen"></i>
                                                    </button>

                                                    @php
                                                        $number++;
                                                        $d_id = intval($data->id);

                                                    @endphp

                                                    <button data-toggle="modal"
                                                        data-target="#confirm-{{ $d_id }}"
                                                        id="remove_{{ $d_id }}" title="Delete"
                                                        class="am-icon-btn danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <!-- Delete Modal -->

                                                    <div class="modal fade modal-mini modal-primary"
                                                        id="confirm-{{ $d_id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="confirm" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('delete_m_r') }}" method="post">
                                                                    <div class="modal-header am-modal__header"> @csrf
                                                                        <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                                        <div class="modal-profile am-modal__title"> حذف إدخال </div>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                                                                    </div>
                                                                    <div class="modal-footer am-modal__footer">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $d_id }}">
                                                                        <button type="button" class="am-btn am-btn-outline"
                                                                            data-dismiss="modal">لا</button>
                                                                        <button type="submit"
                                                                            class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">
                                                    <div class="am-empty">
                                                        <i class="fa fa-wrench"></i>
                                                        <p>لم تتم إضافة أي سجلات صيانة بعد.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $userinfo])
                        </div>
                    </div>


        </section>

        <!--End::Section-->
    </div>
    <div class="modal fade text-right" id="deleteSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">حذف المورد</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--EDIT-->
    <div class="modal fade text-right" id="editepmloyee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تفاصيل سجل الصيانة</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <form action="{{ route('editmentainance') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" value="" id="editproject">
                        <div class="row">
                            {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Maintenance ID Number (See table below. For amendments only):</label><br>
                                <input type="number" class="form-control" name="mid">
                            </div>
                        </div> --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>تاريخ سجل الصيانة (يوم/شهر/سنة):</label><br>
                                    <input type="date" max="2999-12-31" class="form-control" name="mrdate">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عنصر سجل الصيانة:</label>
                                    <input type="text" class="form-control" name="mritem"
                                        placeholder="أدخل اجتماع مراجعة الإدارة:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>نشاط سجل الصيانة:</label>
                                    <input type="text" class="form-control" name="mractivity"
                                        placeholder="أدخل مراجعة الاجتماع السابق:">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>موقع الصيانة:</label>
                                    <input type="text" class="form-control" name="mlocation">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ملاحظات سجل الصيانة:</label>
                                    <input type="text" class="form-control" name="mrobservation">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>إجراء سجل الصيانة:</label>
                                    <input type="text" class="form-control" name="mractions">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تم إجراء نشاط سجل الصيانة بواسطة:</label>
                                    <input type="text" class="form-control" name="mractivityperofrmby">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>دليل المرفق: <span class="text-danger" style="color:#000 !important;">(jpeg,
                                            mp3, mp4, .xls, doc)</span></label>
                                    {{-- <input name="attach_evidence" type="file" class="form-control" accept="all"> --}}
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput2" class="input-file" name="attach_evidence" accept="all"/>
                                        <label for="fileInput2" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هل يوجد أي مشاكل أو نقاط أخرى ترغب في تدوينها؟</label>
                                    <textarea name="any_issues" class="form-control" placeholder="أدخل أي مشاكل أخرى:"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer am-modal__footer">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يلغي</button>
                        <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--VIEW-->

    <div class="modal fade text-right" id="viewEpmloyee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">عرض تفاصيل سجل الصيانة</h5>
                    <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <form action="{{ route('editmentainance') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" value="" id="editproject">
                        <div class="row">
                            {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label>Maintenance ID Number (See table below. For amendments only):</label><br>
                                <input type="number" class="form-control" name="mid" disabled>
                            </div>
                        </div> --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>تاريخ سجل الصيانة (يوم/شهر/سنة):</label><br>
                                    <input type="date" max="2999-12-31" class="form-control" name="mrdate" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>عنصر سجل الصيانة:</label>
                                    <input type="text" class="form-control" name="mritem"
                                        placeholder="أدخل اجتماع مراجعة الإدارة:" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>نشاط سجل الصيانة:</label>
                                    <input type="text" class="form-control" name="mractivity"
                                        placeholder="أدخل مراجعة الاجتماع السابق:" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>موقع الصيانة:</label>
                                    <input type="text" class="form-control" name="mlocation" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ملاحظات سجل الصيانة:</label>
                                    <input type="text" class="form-control" name="mrobservation" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> إجراء سجل الصيانة:</label>
                                    <input type="text" class="form-control" name="mractions" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تم إجراء نشاط سجل الصيانة بواسطة:</label>
                                    <input type="text" class="form-control" name="mractivityperofrmby" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>دليل المرفق: <span class="text-danger" style="color:#000 !important;">(jpeg,
                                            mp3, mp4, .xls, doc)</span>:</label>
                                    <div class="evidence_attachemnt_div"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هل يوجد أي مشاكل أو نقاط أخرى ترغب في تدوينها؟</label>
                                    <input type="text" name="any_issues" disabled class="form-control"
                                        placeholder="Enter Any other issues:">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer am-modal__footer">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


<script>
    function getEid(data) {
        console.log(data);
        $("#editproject").val(data.id);
        $("input[name='mlocation']").val(data.mlocation);
        $("input[name='mractions']").val(data.mractions);
        $("input[name='mractivity']").val(data.mractivity);
        $("input[name='mractivityperofrmby']").val(data.mractivityperofrmby);
        $("input[name='mrdate']").val(data.mrdate);
        $("input[name='mritem']").val(data.mritem);
        $("input[name='mrobservation']").val(data.mrobservation);
        $("input[name='mid']").val(data.mid);
        $("#editepmloyee").modal('show');
        $("textarea[name='any_issues']").val(data.any_issues);

    }


    function viewRecord(data) {
        console.log(data);
        $("#editproject").val(data.id);
        $("input[name='mlocation']").val(data.mlocation);
        $("input[name='mractions']").val(data.mractions);
        $("input[name='mractivity']").val(data.mractivity);
        $("input[name='mractivityperofrmby']").val(data.mractivityperofrmby);
        $("input[name='mrdate']").val(data.mrdate);
        $("input[name='mritem']").val(data.mritem);
        $("input[name='mrobservation']").val(data.mrobservation);
        $("input[name='mid']").val(data.mid);
        $("input[name='any_issues']").val(data.any_issues);
        if (data.attach_evidence) {
            $('.evidence_attachemnt_div').empty().append(
                `<span class="text-dark">Click to view evidence <a target="_blank" href="${data.attach_evidence}">Here</a></span>`
                );
        } else {
            $('.evidence_attachemnt_div').empty().append('No data found');
        }
        $("#viewEpmloyee").modal('show');

    }
</script>
@endsection
