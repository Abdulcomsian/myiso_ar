@extends('dashboard.layouts.app')

@section('content')
    <div class="am-content">

        <div class="am-page-header">
            <div style="display:flex;align-items:center;gap:12px;">
                <button type="button" class="am-page-guide-btn"
                    data-toggle="modal" data-target="#amPageGuide"
                    title="الموظفون" aria-label="الموظفون">
                    <i class="fa fa-info-circle"></i>
                </button>
                <div>
                    <h2>الموظفون</h2>
                </div>
            </div>
        </div>

        @if (Session::has('Error'))
            <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#b83432;background:rgba(235,77,75,0.08);">
                <i class="fa fa-exclamation-circle"></i> {{ Session::get('Error') }}
            </div>
        @endif

        {{-- The three lists used to sit one under the other, all open at once.
             They are tabs now, as on the English page, so only one is on screen
             and each carries its own count. --}}
        <div class="am-tabs">
            <button type="button" class="am-tab active" data-tab="emp">
                <i class="fa fa-id-badge"></i> الموظفون
                <span class="am-tab-count">{{ method_exists($userinfo, 'total') ? $userinfo->total() : count($userinfo) }}</span>
            </button>
            <button type="button" class="am-tab" data-tab="skl">
                <i class="fa fa-tools"></i> المهارات
                <span class="am-tab-count">{{ count($employess) }}</span>
            </button>
            <button type="button" class="am-tab" data-tab="trn">
                <i class="fa fa-graduation-cap"></i> التدريب
                <span class="am-tab-count">{{ count($emptraining) }}</span>
            </button>
        </div>

        {{-- ===== الموظفون ===== --}}
        <div class="am-tab-panel active" data-panel="emp">
            <div class="am-card" style="margin-bottom:16px;">
                <div class="am-card__toolbar">
                    <form method="GET" action="{{ url('/employess') }}" class="am-search" id="amEmpSearchForm"
                        style="flex:1;max-width:340px;margin:0;">
                        <i class="fa fa-search"></i>
                        <input type="text" name="q" id="amEmpSearch" value="{{ $search ?? '' }}"
                            placeholder="ابحث عن موظف…" autocomplete="off">
                    </form>
                    <button type="button" class="am-btn am-btn-primary" id="toggleEmpForm">
                        <i class="fa fa-plus"></i> إضافة موظف
                    </button>
                </div>

                <div class="am-inline-form" id="newEmpForm" style="margin:16px 20px;">
                    <form method="POST" action="{{ route('employee') }}" enctype="multipart/form-data" class="addForm">
                        @csrf
                        <div class="form-row">
                            <div>
                                <div class="form-group">
                                    <label>اللقب:</label>
                                    <input type="text" class="form-control" name="surname" required
                                        placeholder="أدخل اللقب" data-type="add">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>الاسم الأول:</label>
                                    <input type="text" class="form-control" name="first_name" required
                                        placeholder="أدخل الاسم الأول">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>بريد إلكتروني:</label>
                                    <input type="email" class="form-control" name="email" required
                                        placeholder="أدخل البريد الإلكتروني">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <div class="form-group add-emp-number-div">
                                    <label>رقم تعريف الموظف:</label>
                                    <input name="empNumber" type="text" class="form-control" required
                                        placeholder="أدخل رقم هوية الموظف" data-type="add">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>تاريخ البدء (يوم/شهر/سنة):</label>
                                    <input name="startDate" max="2999-12-31" required type="date" class="form-control">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>تحميل السيرة الذاتية للموظف:</label>
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput1" class="input-file" name="employee_cv"
                                            accept="image/*,.doc, .docx,.txt,.pdf" />
                                        <label for="fileInput1" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div style="grid-column:1/-1;">
                                <div class="form-group">
                                    <label>الوصف الوظيفي:</label>
                                    <textarea name="jobdetails" cols="20" rows="3" class="form-control"
                                        placeholder="أدخل الوصف الوظيفي:"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                            <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelEmpForm">يلغي</button>
                            <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i>
                                يُقدِّم</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="am-card">
                <div id="amEmpContainer">
                    @include('dashboard.form_records.partials.employees_table')
                </div>
            </div>
        </div>

        {{-- ===== المهارات ===== --}}
        <div class="am-tab-panel" data-panel="skl">
            <div class="am-card" style="margin-bottom:16px;">
                <div class="am-card__toolbar">
                    <div class="am-search" style="flex:1;max-width:340px;">
                        <i class="fa fa-search"></i>
                        <input type="text" id="amSklSearch" placeholder="ابحث في المهارات…" autocomplete="off">
                    </div>
                    <button type="button" class="am-btn am-btn-primary" id="toggleSklForm">
                        <i class="fa fa-plus"></i> إضافة مهارات العمليات للموظف
                    </button>
                </div>

                <div class="am-inline-form" id="newSklForm" style="margin:16px 20px;">
                    <form action="{{ route('empSkills') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div>
                                <div class="form-group">
                                    <label>رقم تعريف الموظف:</label>
                                    <select name="empid" required class="form-control">
                                        <option value="" selected="selected" disabled="disabled">حدد واحدًا</option>
                                        @foreach ($allEmployees as $item)
                                            <option value="{{ $item->id }}" title="{{ $item->first_name }}">
                                                {{ $item->empNumber . ' (' . $item->first_name . ')' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div style="grid-column:span 2;">
                                <div class="form-group">
                                    <label>المهارة:</label>
                                    <input type="text" name="empskill" class="form-control" required
                                        placeholder="أدخل مهارة">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                            <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelSklForm">يلغي</button>
                            <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i>
                                يُقدِّم</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="am-card">
                <div class="am-table-wrap">
                    <table class="am-table" id="amSklTable">
                        <thead>
                            <tr>
                                <th style="width:170px;">رقم تعريف الموظف:</th>
                                <th style="width:150px;">اللقب</th>
                                <th style="width:150px;">الاسم الأول</th>
                                <th style="width:560px;">المهارة:</th>
                                <th style="width:150px;">النشاط</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employess as $item)
                                <tr data-search="{{ mb_strtolower($item->empNumber . ' ' . $item->surname . ' ' . $item->first_name . ' ' . $item->empskill) }}">
                                    <td><span class="am-cell-sub">{{ $item->empNumber }}</span></td>
                                    <td><span class="am-cell-primary">{{ $item->surname }}</span></td>
                                    <td><span class="am-cell-sub">{{ $item->first_name }}</span></td>
                                    <td><span class="am-cell-sub">{{ $item->empskill }}</span></td>
                                    <td style="text-align:left;white-space:nowrap;">
                                        <div class="am-actions">
                                            <button class="am-icon-btn" title="عرض تفاصيل المهارة"
                                                data-toggle="modal" data-target="#skill{{ $item->skill_id }}"><i
                                                    class="fa fa-eye"></i>
                                            </button>
                                            <button onclick="getEidskill({{ json_encode($item) }});"
                                                class="am-icon-btn" title="تحرير"><i class="fa fa-pen"></i>
                                            </button>
                                            <button class="am-icon-btn danger"
                                                onclick="deleteemplskill({{ $item->skill_id }})"
                                                title="حذف مهارة الموظف">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade text-right" id="skill{{ $item->skill_id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="model2Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog" style="max-width:720px;" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header am-modal__header">
                                                        <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                        <h5 class="modal-title am-modal__title">إجمالي
                                                            مهارات الموظفين المدرجة</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div>
                                                                <div class="form-group">
                                                                    <label>رقم تعريف الموظف:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $item->empNumber }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="form-group">
                                                                    <label>المهارة:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $item->empskill }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer am-modal__footer">
                                                        <button type="button" class="am-btn am-btn-outline"
                                                            data-dismiss="modal">يغلق</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="am-empty">
                                            <i class="fa fa-tools"></i>
                                            <p>لم يتم تسجيل أي مهارات بعد.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="am-pagination" id="amSklPagination"></div>
            </div>
        </div>

        {{-- ===== التدريب ===== --}}
        <div class="am-tab-panel" data-panel="trn">
            <div class="am-card" style="margin-bottom:16px;">
                <div class="am-card__toolbar">
                    <div class="am-search" style="flex:1;max-width:340px;">
                        <i class="fa fa-search"></i>
                        <input type="text" id="amTrnSearch" placeholder="ابحث في التدريب…" autocomplete="off">
                    </div>
                    <button type="button" class="am-btn am-btn-primary" id="toggleTrnForm">
                        <i class="fa fa-plus"></i> إضافة سجل تدريب للموظف
                    </button>
                </div>

                <div class="am-inline-form" id="newTrnForm" style="margin:16px 20px;">
                    <form action="{{ route('empTraining') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div>
                                <div class="form-group">
                                    <label>رقم تعريف الموظف:</label>
                                    <select name="empid" required class="form-control">
                                        <option value="" selected="selected" disabled="disabled">حدد واحدًا</option>
                                        @foreach ($allEmployees as $item)
                                            <option value="{{ $item->id }}" title="{{ $item->first_name }}">
                                                {{ $item->empNumber . ' (' . $item->first_name . ')' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>تاريخ التدريب (شهر/يوم/سنة):</label>
                                    <input type="date" max="2999-12-31" required class="form-control"
                                        name="traningdate">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div>
                                <div class="form-group">
                                    <label>تفاصيل التدريب:</label>
                                    <input type="text" class="form-control" required name="traningdetails">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>تحميل شهادة التدريب <span class="am-hint">(PDF, jpeg, png)</span>:</label>
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput3" class="input-file" name="attach_file"
                                            accept="image/*,.pdf,.jpeg,.png">
                                        <label for="fileInput3" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                            <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelTrnForm">يلغي</button>
                            <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i>
                                يُقدِّم</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="am-card">
                <div class="am-table-wrap">
                    <table class="am-table" id="amTrnTable">
                        <thead>
                            <tr>
                                <th style="width:170px;">رقم تعريف الموظف</th>
                                <th style="width:150px;">اللقب</th>
                                <th style="width:150px;">الاسم الأول</th>
                                <th style="width:200px;">تاريخ البدء</th>
                                <th style="width:240px;">تاريخ التدريب</th>
                                <th style="width:120px;">تفاصيل التدريب</th>
                                <th style="width:150px;">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($emptraining as $item)
                                <tr data-search="{{ mb_strtolower($item->empNumber . ' ' . $item->surname . ' ' . $item->first_name . ' ' . $item->traningdetails) }}">
                                    <td><span class="am-cell-sub">{{ $item->empNumber }}</span></td>
                                    <td><span class="am-cell-primary">{{ $item->surname }}</span></td>
                                    <td><span class="am-cell-sub">{{ $item->first_name }}</span></td>
                                    <td><span class="am-chip info">{{ date('d/m/Y', strtotime($item->startDate)) }}</span></td>
                                    <td><span class="am-chip info">{{ date('d/m/Y', strtotime($item->traningdate)) }}</span></td>
                                    <td><span class="am-cell-sub">{{ $item->traningdetails }}</span></td>
                                    <td style="text-align:left;white-space:nowrap;">
                                        <div class="am-actions">
                                            <button class="am-icon-btn" title="عرض سجل التدريب"
                                                data-toggle="modal"
                                                data-target="#training{{ $item->traning_id }}"><i
                                                    class="fa fa-eye"></i>
                                            </button>
                                            <button onclick="getEidtraining({{ json_encode($item) }});"
                                                class="am-icon-btn" title="تحرير"><i class="fa fa-pen"></i>
                                            </button>
                                            <button class="am-icon-btn danger"
                                                onclick="deleteempltraining({{ $item->traning_id }})"
                                                title="حذف تدريب الموظفين">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade text-right" id="training{{ $item->traning_id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="model3Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog" style="max-width:720px;" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header am-modal__header">
                                                        <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                        <h5 class="modal-title am-modal__title">ملخص
                                                            سجل التدريب</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div>
                                                                <div class="form-group">
                                                                    <label>رقم تعريف الموظف</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $item->empNumber }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="form-group">
                                                                    <label>تاريخ التدريب (يوم/شهر/سنة):</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $item->traningdate }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div style="grid-column:1/-1;">
                                                                <div class="form-group">
                                                                    <label>تفاصيل التدريب</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $item->traningdetails }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($item->attach_cert)
                                                            <div class="form-row">
                                                                <div style="grid-column:1/-1;">
                                                                    <div class="form-group">
                                                                        <label>شهادة التدريب</label><br>
                                                                        <a href="{{ $item->attach_cert }}" target="_blank">انقر للعرض</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer am-modal__footer">
                                                        <button type="button" class="am-btn am-btn-outline"
                                                            data-dismiss="modal">يغلق</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="am-empty">
                                            <i class="fa fa-graduation-cap"></i>
                                            <p>لا توجد سجلات تدريب بعد.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                            {{-- Courses finished in the LMS. Left exactly as it was - only the
                                 rows around it changed. $wp_users is empty when the LMS cannot
                                 be reached, so none of this runs in that case. --}}
                            @foreach ($wp_users as $wpuser)
                                @foreach ($wpuser as $user)
                                    @php
                                        $uid = '"user_id";i:' . $user->ID . ';';
                                        $options = App\CertificateOption::where('option_name', 'LIKE', "%user_cert_%")->Where('option_value', 'LIKE', '%' . $uid . '%')->get();
                                        $finshedcourses = App\CertificateUserItems::Where('ID', $user->ID)->where('user_status', 'finished')->get();

                                        if (count($finshedcourses) > 0) {
                                            foreach ($finshedcourses as $key => $finshedcourse) {
                                                $courses = App\CertificateCourse::where('ID', $finshedcourse->item_id)->get();
                                                foreach ($courses as $key => $course) {
                                                    $usercourses[] = $course->post_title;
                                                    $postDate[] = $course->post_date;
                                                }

                                                $startdate = $finshedcourse->start_time;
                                                $endate = $finshedcourse->end_time;
                                            }
                                            $laravel_employee_detail = App\Employee::where('email', $user->user_email)->first();
                                    @endphp
                                    @if (!empty($usercourses) && count($usercourses) > 0)
                                        @foreach ($usercourses as $key => $usercourse)
                                            {{-- the English page carries this guard and this one did not:
                                                 an LMS account whose address matches no employee row leaves
                                                 $laravel_employee_detail null, and reading ->empNumber off it
                                                 would take the page down --}}
                                            @if (isset($laravel_employee_detail) && $laravel_employee_detail)
                                            <tr data-search="{{ mb_strtolower(($laravel_employee_detail->empNumber ?? '') . ' ' . $usercourse) }}">
                                                <td><span class="am-cell-sub">{{ $laravel_employee_detail->empNumber }}</span></td>
                                                <td><span class="am-cell-sub">{{ $laravel_employee_detail->surname }}</span></td>
                                                <td><span class="am-cell-sub">{{ $laravel_employee_detail->first_name }}</span></td>
                                                <td><span class="am-cell-sub">{{ $startdate }}</span></td>
                                                <td><span class="am-cell-sub">{{ $endate }}</span></td>
                                                <td>{{ $usercourse }}</td>
                                                <td> </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                    @php } @endphp
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="am-pagination" id="amTrnPagination"></div>
            </div>
        </div>

    </div>

    {{-- Page guide --}}
    @include('dashboard.form_records.partials.guides.employess')

    <div class="modal fade text-right" id="deleteSupplier" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:460px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <h5 class="modal-title am-modal__title" id="modallabel">حذف الموظف</h5>
                </div>
                <div class="modal-body ">
                    <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                </div>
                <div class="modal-footer am-modal__footer">
                    <form action="{{ route('employess-delete') }}" method="POST">
                        @csrf
                        <input type="hidden" value="" name="id" id="res_id" />
                        <input type="hidden" name="type" value="" id="type" />
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">لا</button>
                        <button type="submit" class="am-btn am-btn-danger"><i class="fa fa-trash"></i> نعم</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- edit modal --}}
    <div class="modal fade text-right" id="editepmloyee" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:820px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title">تحرير الموظف</h5>
                </div>
                <form method="POST" action=" {{ route('editemployee') }} " enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editproject" value="">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>اللقب:</label>
                                    <input type="text" class="form-control" name="surname" placeholder="أدخل اللقب">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>الاسم الأول</label>
                                    <input type="text" class="form-control" name="first_name"
                                        placeholder="أدخل الاسم الأول">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 edit-emp-number-div">
                                <div class="form-group edit-emp-number-div">
                                    <label>هوية الموظف:</label>
                                    <input type="text" name="empNumber" required class="form-control"
                                        data-type="edit">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ البدء (يوم/شهر/سنة):</label>
                                    <input name="startDate" max="2999-12-31" type="date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>الوصف الوظيفي:</label>
                                    <textarea name="jobdetails" id="jobdetails2" cols="20" rows="5" class="form-control"
                                        placeholder="أدخل الوصف الوظيفي:"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>تحميل السيرة الذاتية للموظف:</label>
                                    <div class="custom-file-input-tag form-control">
                                        <input type="file" id="fileInput2" class="input-file" name="employee_cv"
                                            accept="image/*,.doc, .docx,.txt,.pdf" />
                                        <label for="fileInput2" class="file-label">
                                            <span class="file-text">اختيار الملف</span>
                                            <span class="file-chosen">لم يتم اختيار ملف</span>
                                        </label>
                                    </div>
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


    <!--employe skills-->
    <div class="modal fade text-right" id="editepmloyeeskills" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title">تحرير الموظف</h5>
                </div>
                <form method="POST" action="{{ route('update-employes-skill') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم تعريف الموظف</label>
                                    <input name="editempid" readonly type="number" class="form-control">
                                    <input type="hidden" required placeholder="أدخل رقم هوية الموظف"
                                        name="employskillid" value="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>المهارة:</label>
                                    <input type="text" name="editempskill" required class="form-control"
                                        placeholder="أدخل اسم المهارات:">
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

    <!--edit employ traninging-->
    <div class="modal fade text-right" id="editepmloyeetraining" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:720px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title">تحرير تدريب الموظفين</h5>
                </div>
                <form method="POST" action="{{ route('update-employes-training') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هوية الموظف:</label><br>
                                    <input type="hidden" name="edittrainid" />
                                    <input type="number" readonly class="form-control" name="editempidt">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تاريخ التدريب (يوم/شهر/سنة):</label>
                                    <input type="date" max="2999-12-31" class="form-control" name="edittraningdate">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>تفاصيل التدريب:</label>
                                    <input type="text" class="form-control" name="edittraningdetails">
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

    {{-- The page's own behaviour, written the way the English page writes it:
         plain JavaScript, no library, so it runs as soon as the markup is
         there. The jQuery that drives the Bootstrap modals stays in the
         myscript section below, which runs after jQuery has loaded. --}}
    <script>
        // Tabs
        document.querySelectorAll('.am-tab').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.am-tab').forEach(function(b) { b.classList.remove('active'); });
                document.querySelectorAll('.am-tab-panel').forEach(function(p) { p.classList.remove('active'); });
                btn.classList.add('active');
                document.querySelector('[data-panel="' + btn.getAttribute('data-tab') + '"]').classList.add('active');
            });
        });

        // Show / hide the three add forms
        [['toggleEmpForm', 'newEmpForm', 'cancelEmpForm'],
         ['toggleSklForm', 'newSklForm', 'cancelSklForm'],
         ['toggleTrnForm', 'newTrnForm', 'cancelTrnForm']].forEach(function(ids) {
            var t = document.getElementById(ids[0]),
                f = document.getElementById(ids[1]),
                c = document.getElementById(ids[2]);
            t && t.addEventListener('click', function() { f.classList.toggle('open'); });
            c && c.addEventListener('click', function() { f.classList.remove('open'); });
        });

        function amEmpDebounce(fn, w) {
            var t;
            return function() {
                var c = this, a = arguments;
                clearTimeout(t);
                t = setTimeout(function() { fn.apply(c, a); }, w);
            };
        }

        // Skills and Training have no list endpoint of their own, so those two
        // search and page in the browser over the rows already on the page.
        function amSetupClientTable(searchId, tableId, pagId) {
            var per = 10,
                input = document.getElementById(searchId),
                tb = document.querySelector('#' + tableId + ' tbody'),
                p = document.getElementById(pagId);
            if (!tb || !p) return;
            var rows = Array.prototype.slice.call(tb.querySelectorAll('tr[data-search]')),
                F = rows.slice(),
                pg = 1;

            function render() {
                var T = F.length,
                    TP = Math.max(1, Math.ceil(T / per));
                if (pg > TP) pg = TP;
                rows.forEach(function(x) { x.style.display = 'none'; });
                F.slice((pg - 1) * per, pg * per).forEach(function(x) { x.style.display = ''; });
                var fr = T === 0 ? 0 : (pg - 1) * per + 1,
                    to = Math.min(pg * per, T);
                var h = '<div class="am-pagination__info">عرض <strong>' + fr + '–' + to +
                        '</strong> من <strong>' + T + '</strong></div><div class="am-pagination__nav">';
                h += '<button type="button" data-p="' + (pg - 1) + '" ' + (pg <= 1 ? 'disabled' : '') + '>&lsaquo;</button>';
                var s = Math.max(1, pg - 2),
                    e = Math.min(TP, s + 4);
                s = Math.max(1, e - 4);
                for (var q = s; q <= e; q++) {
                    h += '<button type="button" data-p="' + q + '" ' + (q === pg ? 'class="active"' : '') + '>' + q + '</button>';
                }
                h += '<button type="button" data-p="' + (pg + 1) + '" ' + (pg >= TP ? 'disabled' : '') + '>&rsaquo;</button></div>';
                p.innerHTML = h;
            }

            input && input.addEventListener('input', amEmpDebounce(function() {
                var q = this.value.trim().toLowerCase();
                F = q === '' ? rows.slice() : rows.filter(function(x) {
                    return x.getAttribute('data-search').indexOf(q) !== -1;
                });
                pg = 1;
                render();
            }, 250));

            p.addEventListener('click', function(e) {
                var b = e.target.closest('button[data-p]');
                if (!b || b.disabled) return;
                var q = parseInt(b.getAttribute('data-p'), 10);
                if (!isNaN(q) && q >= 1) { pg = q; render(); }
            });

            render();
        }
        amSetupClientTable('amSklSearch', 'amSklTable', 'amSklPagination');
        amSetupClientTable('amTrnSearch', 'amTrnTable', 'amTrnPagination');

        // Employees searches and pages on the server, so only the table comes back
        (function() {
            var input = document.getElementById('amEmpSearch');
            var form = document.getElementById('amEmpSearchForm');
            var container = document.getElementById('amEmpContainer');
            if (!container) return;
            var baseUrl = '{{ url('/employess') }}';

            function fetchPage(page) {
                var q = input ? input.value.trim() : '';
                container.style.opacity = '0.5';
                container.style.pointerEvents = 'none';
                fetch(baseUrl + '?q=' + encodeURIComponent(q) + '&page=' + page, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(function(r) { return r.text(); })
                    .then(function(html) {
                        container.innerHTML = html;
                        container.style.opacity = '';
                        container.style.pointerEvents = '';
                    })
                    .catch(function() {
                        container.style.opacity = '';
                        container.style.pointerEvents = '';
                    });
            }

            input && input.addEventListener('input', amEmpDebounce(function() { fetchPage(1); }, 350));
            form && form.addEventListener('submit', function(e) { e.preventDefault(); fetchPage(1); });
            container.addEventListener('click', function(e) {
                var btn = e.target.closest('.am-page-link');
                if (!btn || btn.disabled) return;
                e.preventDefault();
                var p = parseInt(btn.getAttribute('data-page'), 10);
                if (!isNaN(p) && p > 0) fetchPage(p);
            });
        })();
    </script>
@endsection

@section('myscript')
    <script>
        //User for checking emp number for current logged in user , if exist or not by assad yaqoob
        let userId = "{{ \Illuminate\Support\Facades\Auth::id() }}";
        let type = '';
        let ajaxCall = null;
        $(document).on('blur', 'input[name="empNumber"]', function() {
            let empNumber = $(this).val();
            type = $(this).data('type');
            let empId = type == 'edit' ? $('#editproject').val() : '';

            let data = {
                empNumber: empNumber,
                type: type,
                userId: userId,
                _token: "{{ csrf_token() }}",
                empId: empId
            }
            if (ajaxCall != null) {
                ajaxCall.abort();
            }
            ajaxCall = $.ajax({
                method: 'get',
                url: '{{ url('/check-emp-number') }}',
                data: data,
                success: function(response) {
                    $("#emp_err_msg").remove();
                    if (response.status == 0) {
                        let cls = `.${type}-emp-number-div`;
                        $(cls).append(`<p id="emp_err_msg" class="text-danger">${response.message}</p>`)
                        $('input[name="empNumber"]').val('');
                    }
                }
            })
        });

        function deleteempl(id) {
            $("#modallabel").html("حذف الموظف");
            $("#res_id").val(id);
            $("#type").val('employee');
            $("#deleteSupplier").modal('show');
        }

        function deleteemplskill(id) {
            $("#modallabel").html("حذف مهارة الموظف");
            $("#res_id").val(id);
            $("#type").val('employeeskill');
            $("#deleteSupplier").modal('show');
        }

        function deleteempltraining(id) {
            $("#modallabel").html("حذف تدريب الموظفين");
            $("#res_id").val(id);
            $("#type").val('employeetraining');
            $("#deleteSupplier").modal('show');
        }

        function getEid(data) {
            var m = $("#editepmloyee");
            $("#editproject").val(data.id);
            m.find("input[name='empNumber']").val(data.empNumber);
            m.find("input[name='first_name']").val(data.first_name);
            m.find("#jobdetails2").val(data.jobdetails);
            m.find("input[name='startDate']").val(data.startDate);
            m.find("input[name='surname']").val(data.surname);
            m.modal('show');
        }

        function getEidskill(data) {
            $("input[name='editempid']").val(parseInt(data.empNumber));
            $("input[name='editempskill']").val(data.empskill);
            $("input[name='employskillid']").val(data.skill_id);
            $("#editepmloyeeskills").modal('show');
        }

        function getEidtraining(data) {
            $("input[name='editempidt']").val(data.empNumber);
            $("input[name='edittraningdate']").val(data.traningdate);
            $("input[name='edittraningdetails']").val(data.traningdetails);
            $("input[name='edittrainid']").val(data.traning_id);
            $("#editepmloyeetraining").modal('show');
        }
    </script>
    @include('admin.dashboard.includes.foot')
@endsection
