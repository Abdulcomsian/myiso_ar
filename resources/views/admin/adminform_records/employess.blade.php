@extends('admin.dashboard.layouts.app')

@section('content')
@php $urlparam = request()->route()->parameters; @endphp

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content" style="padding:26px;">

    <div class="am-page-header">
        <div>
            <h2>الموظفون</h2>
            <p>إدارة سجلات الموظفين ومهارات العمليات وسجل التدريب.</p>
        </div>
        <div>
            <a href="{{ url('/edit_user/'.$urlparam['userid']) }}" class="am-btn am-btn-outline">
                <i class="fa fa-arrow-left"></i> العودة إلى النماذج
            </a>
        </div>
    </div>

    @if(Session::has('Error'))
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#b83432;background:rgba(235,77,75,0.08);">
            <i class="fa fa-exclamation-circle"></i> {{ Session::get('Error') }}
        </div>
    @endif

    @if ($message = Session::get('msg'))
        <div class="am-card" style="padding:14px 20px;margin-bottom:16px;color:#1a8a5c;background:rgba(38,194,129,0.08);">
            <i class="fa fa-check-circle"></i> {{ $message }}
        </div>
    @endif

    <div class="am-card" style="padding:16px 20px;margin-bottom:16px;background:rgba(46,59,154,0.04);border:1px solid rgba(46,59,154,0.12);">
        <div style="display:flex;gap:12px;align-items:flex-start;">
            <span style="width:36px;height:36px;flex-shrink:0;border-radius:10px;background:var(--am-primary-tint);color:var(--am-primary);display:inline-flex;align-items:center;justify-content:center;font-size:15px;"><i class="fa fa-info-circle"></i></span>
            <div style="font-size:13px;color:var(--am-text);line-height:1.55;">
                تتبع جميع المعلومات المتعلقة بالموظفين العاملين، بما في ذلك سجلات التدريب ومهارات العمليات.
            </div>
        </div>
    </div>

    {{-- Tabs --}}
    <div class="am-tabs">
        <button type="button" class="am-tab active" data-tab="emp">
            <i class="fa fa-id-badge"></i> الموظفون
            <span class="am-tab-count">{{ count($userinfo) }}</span>
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

    {{-- ===== Employees Tab ===== --}}
    <div class="am-tab-panel active" data-panel="emp">
        <div class="am-card" style="margin-bottom:16px;">
            <div class="am-card__toolbar">
                <div class="am-search" style="flex:1;max-width:340px;">
                    <i class="fa fa-search"></i>
                    <input type="text" id="amEmpSearch" placeholder="ابحث في الموظفين…" autocomplete="off">
                </div>
                <button type="button" class="am-btn am-btn-primary" id="toggleEmpForm">
                    <i class="fa fa-plus"></i> إضافة موظف
                </button>
            </div>

            <div class="am-inline-form" id="newEmpForm" style="margin:16px 20px;">
                <form method="POST" action="{{ route('employee') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="is_admin" value="admin">
                    <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
                    <div class="form-row">
                        <div><label>اللقب</label><input type="text" name="surname" required></div>
                        <div><label>الاسم الأول</label><input type="text" name="first_name" required></div>
                        <div><label>البريد الإلكتروني</label><input type="email" name="email" required></div>
                    </div>
                    <div class="form-row">
                        <div><label>معرف الموظف</label><input name="empNumber" type="text" required data-type="add" class="add-emp-number-div"></div>
                        <div><label>تاريخ التعيين</label><input name="startDate" max="2999-12-31" type="date" required></div>
                        <div><label>تحميل السيرة الذاتية</label><input name="employee_cv" type="file" accept="image/*,.doc,.docx,.txt,.pdf"></div>
                    </div>
                    <div class="form-row">
                        <div style="grid-column:1/-1;"><label>الوصف الوظيفي</label><textarea name="jobdetails" rows="3" placeholder="الوصف الوظيفي"></textarea></div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelEmpForm">إلغاء</button>
                        <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ الموظف</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="am-card">
            <div class="am-table-wrap">
                <table class="am-table" id="amEmpTable">
                    <thead>
                        <tr>
                            <th style="width:60px;">#</th>
                            <th>الموظف</th>
                            <th>البريد الإلكتروني</th>
                            <th>تفاصيل الوظيفة</th>
                            <th>السيرة الذاتية</th>
                            <th>تاريخ التعيين</th>
                            <th style="text-align:right;">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($userinfo as $index => $item)
                            <tr data-search="{{ strtolower($item->empNumber . ' ' . $item->surname . ' ' . $item->first_name . ' ' . $item->email) }}">
                                <td><span class="am-cell-sub">#{{ $item->empNumber }}</span></td>
                                <td>
                                    <div class="am-user-cell">
                                        <span class="am-avatar">{{ strtoupper(substr($item->first_name ?? 'E', 0, 1)) }}</span>
                                        <div>
                                            <span class="am-cell-primary">{{ $item->first_name }} {{ $item->surname }}</span>
                                            <span class="am-cell-sub">موظف: {{ $item->empNumber }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>{{ Str::limit($item->jobdetails, 50) }}</td>
                                <td>
                                    @if (!empty($item->cv))
                                        @php $extPath = pathinfo($item->cv); @endphp
                                        @if (($extPath['extension'] ?? '') === 'pdf')
                                            <a style="color:var(--am-primary);cursor:pointer;" onclick="viewCV('{{ asset($item->cv) }}')"><i class="fa fa-file-pdf"></i> عرض</a>
                                        @else
                                            <a target="_blank" href="{{ asset($item->cv) }}" style="color:var(--am-primary);"><i class="fa fa-file-alt"></i> عرض</a>
                                        @endif
                                    @else
                                        <span class="am-cell-sub">—</span>
                                    @endif
                                </td>
                                <td><span class="am-chip info">{{ date('d M Y', strtotime($item->startDate)) }}</span></td>
                                <td style="text-align:right;white-space:nowrap;">
                                    <div class="am-actions">
                                        <button type="button" class="am-icon-btn" title="عرض" onclick='amEmpView(@json($item))'><i class="fa fa-eye"></i></button>
                                        <button type="button" class="am-icon-btn" title="تعديل" onclick='amEmpEdit(@json($item))'><i class="fa fa-pen"></i></button>
                                        <button type="button" class="am-icon-btn danger am-confirm-delete"
                                                title="حذف"
                                                data-action="{{ route('deleteEmployeeadmin') }}"
                                                data-id="{{ $item->id }}"
                                                data-extra="type=employee"
                                                data-label="{{ $item->first_name }} {{ $item->surname }}"
                                                data-type="موظف">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7"><div class="am-empty"><i class="fa fa-id-badge"></i><p>لم تتم إضافة أي موظفين بعد.</p></div></td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="am-pagination" id="amEmpPagination"></div>
        </div>
    </div>

    {{-- ===== Skills Tab ===== --}}
    <div class="am-tab-panel" data-panel="skl">
        <div class="am-card" style="margin-bottom:16px;">
            <div class="am-card__toolbar">
                <div class="am-search" style="flex:1;max-width:340px;">
                    <i class="fa fa-search"></i>
                    <input type="text" id="amSklSearch" placeholder="ابحث في المهارات…" autocomplete="off">
                </div>
                <button type="button" class="am-btn am-btn-primary" id="toggleSklForm">
                    <i class="fa fa-plus"></i> إضافة مهارة عملية
                </button>
            </div>

            <div class="am-inline-form" id="newSklForm" style="margin:16px 20px;">
                <form action="{{ route('empSkills') }}" method="POST">
                    @csrf
                    <input type="hidden" name="is_admin" value="admin">
                    <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
                    <div class="form-row">
                        <div>
                            <label>الموظف</label>
                            <select name="empid" required>
                                <option value="" disabled selected>اختر الموظف</option>
                                @if(isset($userinfo) && $userinfo != "")
                                    @foreach($userinfo as $item)
                                        <option value="{{ $item->id }}">{{ $item->empNumber }} ({{ $item->first_name }})</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div style="grid-column:span 2;"><label>المهارة</label><input type="text" required name="empskill" placeholder="اسم المهارة"></div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelSklForm">إلغاء</button>
                        <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ المهارة</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="am-card">
            <div class="am-table-wrap">
                <table class="am-table" id="amSklTable">
                    <thead>
                        <tr>
                            <th style="width:60px;">#</th>
                            <th>الموظف</th>
                            <th>المهارة</th>
                            <th style="text-align:right;">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employess as $index => $item)
                            <tr data-search="{{ strtolower($item->empNumber . ' ' . $item->surname . ' ' . $item->first_name . ' ' . $item->empskill) }}">
                                <td><span class="am-cell-sub">#{{ $item->empNumber }}</span></td>
                                <td>
                                    <span class="am-cell-primary">{{ $item->first_name }} {{ $item->surname }}</span>
                                    <span class="am-cell-sub">موظف: {{ $item->empNumber }}</span>
                                </td>
                                <td><span class="am-chip info">{{ $item->empskill }}</span></td>
                                <td style="text-align:right;white-space:nowrap;">
                                    <div class="am-actions">
                                        <button type="button" class="am-icon-btn" title="تعديل" onclick='amSklEdit(@json($item))'><i class="fa fa-pen"></i></button>
                                        <button type="button" class="am-icon-btn danger am-confirm-delete"
                                                title="حذف"
                                                data-action="{{ route('deleteEmployeeadmin') }}"
                                                data-id="{{ $item->skill_id }}"
                                                data-extra="type=employeeskill"
                                                data-label="{{ $item->empskill }}"
                                                data-type="مهارة موظف">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4"><div class="am-empty"><i class="fa fa-tools"></i><p>لم يتم تسجيل أي مهارات بعد.</p></div></td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="am-pagination" id="amSklPagination"></div>
        </div>
    </div>

    {{-- ===== Training Tab ===== --}}
    <div class="am-tab-panel" data-panel="trn">
        <div class="am-card" style="margin-bottom:16px;">
            <div class="am-card__toolbar">
                <div class="am-search" style="flex:1;max-width:340px;">
                    <i class="fa fa-search"></i>
                    <input type="text" id="amTrnSearch" placeholder="ابحث في التدريب…" autocomplete="off">
                </div>
                <button type="button" class="am-btn am-btn-primary" id="toggleTrnForm">
                    <i class="fa fa-plus"></i> إضافة سجل تدريب
                </button>
            </div>

            <div class="am-inline-form" id="newTrnForm" style="margin:16px 20px;">
                <form action="{{ route('empTraining') }}" method="POST">
                    @csrf
                    <input type="hidden" name="is_admin" value="admin">
                    <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
                    <div class="form-row">
                        <div>
                            <label>الموظف</label>
                            <select name="empid" required>
                                <option value="" disabled selected>اختر الموظف</option>
                                @if(isset($userinfo) && $userinfo != "")
                                    @foreach($userinfo as $item)
                                        <option value="{{ $item->id }}">{{ $item->empNumber }} ({{ $item->first_name }})</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div><label>تاريخ التدريب</label><input type="date" required max="2999-12-31" name="traningdate"></div>
                    </div>
                    <div class="form-row">
                        <div style="grid-column:1/-1;"><label>تفاصيل التدريب</label><input type="text" required name="traningdetails" placeholder="تفاصيل التدريب"></div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="am-btn am-btn-outline am-btn-sm" id="cancelTrnForm">إلغاء</button>
                        <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> حفظ التدريب</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="am-card">
            <div class="am-table-wrap">
                <table class="am-table" id="amTrnTable">
                    <thead>
                        <tr>
                            <th style="width:60px;">#</th>
                            <th>الموظف</th>
                            <th>تاريخ التعيين</th>
                            <th>تاريخ التدريب</th>
                            <th>التفاصيل</th>
                            <th style="text-align:right;">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($emptraining as $index => $item)
                            <tr data-search="{{ strtolower($item->empNumber . ' ' . $item->surname . ' ' . $item->first_name . ' ' . $item->traningdetails) }}">
                                <td><span class="am-cell-sub">#{{ $item->empNumber }}</span></td>
                                <td>
                                    <span class="am-cell-primary">{{ $item->first_name }} {{ $item->surname }}</span>
                                    <span class="am-cell-sub">موظف: {{ $item->empNumber }}</span>
                                </td>
                                <td>{{ date('d M Y', strtotime($item->startDate)) }}</td>
                                <td><span class="am-chip info">{{ date('d M Y', strtotime($item->traningdate)) }}</span></td>
                                <td>{{ $item->traningdetails }}</td>
                                <td style="text-align:right;white-space:nowrap;">
                                    <div class="am-actions">
                                        <button type="button" class="am-icon-btn" title="تعديل" onclick='amTrnEdit(@json($item))'><i class="fa fa-pen"></i></button>
                                        <button type="button" class="am-icon-btn danger am-confirm-delete"
                                                title="حذف"
                                                data-action="{{ route('deleteEmployeeadmin') }}"
                                                data-id="{{ $item->traning_id }}"
                                                data-extra="type=employeetraining"
                                                data-label="{{ $item->traningdetails }}"
                                                data-type="سجل تدريب">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6"><div class="am-empty"><i class="fa fa-graduation-cap"></i><p>لا توجد سجلات تدريب بعد.</p></div></td></tr>
                        @endforelse
                        {{-- WordPress LMS certificates --}}
                        @foreach ($wp_users as $wpuser)
                            @foreach($wpuser as $user)
                                @php
                                    $uid = '"user_id";i:'.$user->ID.';';
                                    $options = App\CertificateOption::where('option_name', 'LIKE', "%user_cert_%")->Where('option_value', 'LIKE', "%".$uid."%")->get();
                                    if (count($options) > 0) {
                                        $usercourses = [];
                                        $postDate = [];
                                        foreach ($options as $option) {
                                            $unserialized = @unserialize($option->option_value);
                                            if ($unserialized && isset($unserialized['course_id'])) {
                                                $courses = App\CertificateCourse::where('ID', $unserialized['course_id'])->get();
                                                foreach ($courses as $course) {
                                                    $usercourses[] = $course->post_title;
                                                    $postDate[] = $course->post_date;
                                                }
                                            }
                                        }
                                        $laravel_employee_detail = App\Employee::where('email', $user->user_email)->first();
                                @endphp
                                    @foreach($usercourses as $key => $usercourse)
                                        @if($laravel_employee_detail)
                                            <tr data-search="{{ strtolower(($laravel_employee_detail->empNumber ?? '') . ' ' . ($laravel_employee_detail->first_name ?? '') . ' ' . $usercourse) }}">
                                                <td><span class="am-cell-sub">#{{ $laravel_employee_detail->empNumber ?? '—' }}</span></td>
                                                <td>{{ $laravel_employee_detail->first_name ?? '' }} {{ $laravel_employee_detail->surname ?? '' }}</td>
                                                <td>{{ $postDate[$key] ?? '' }}</td>
                                                <td><span class="am-chip success">دورة LMS</span></td>
                                                <td>{{ $usercourse }}</td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    @endforeach
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

{{-- View Employee modal --}}
<div class="am-modal" id="viewEmpModal" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:720px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">تفاصيل الموظف</h4>
        </div>
        <div class="am-modal__body">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;font-size:13px;">
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">اللقب</div><div id="vemp-surname">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الاسم الأول</div><div id="vemp-first">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">معرف الموظف</div><div id="vemp-num">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">البريد الإلكتروني</div><div id="vemp-email">—</div></div>
                <div><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">تاريخ التعيين</div><div id="vemp-start">—</div></div>
                <div style="grid-column:1/-1;"><div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;margin-bottom:4px;">الوصف الوظيفي</div><div id="vemp-job">—</div></div>
            </div>
        </div>
        <div class="am-modal__footer"><button type="button" class="am-btn am-btn-outline am-modal-close">إغلاق</button></div>
    </div>
</div>

{{-- Edit Employee modal --}}
<div class="am-modal" id="editepmloyee" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:820px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تعديل الموظف</h4>
        </div>
        <form method="POST" action="{{ route('editemployee') }}" enctype="multipart/form-data" style="display:contents;">
            @csrf
            <input type="hidden" name="is_admin" value="admin">
            <input type="hidden" name="user_id" value="{{ $urlparam['userid'] }}">
            <input type="hidden" name="id" id="editproject">
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-6"><label>اللقب</label><input type="text" class="form-control" name="surname"></div>
                    <div class="col-lg-6"><label>الاسم الأول</label><input type="text" class="form-control" name="first_name"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 edit-emp-number-div"><label>معرف الموظف</label><input type="text" class="form-control" name="empNumber" data-type="edit" required></div>
                    <div class="col-lg-6"><label>تاريخ التعيين</label><input name="startDate" max="2999-12-31" type="date" class="form-control"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12"><label>الوصف الوظيفي</label><textarea class="form-control" name="jobdetails" id="jobdetails2" rows="4"></textarea></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12"><label>تحميل السيرة الذاتية</label><input name="employee_cv" type="file" class="form-control" accept="image/*,.doc,.docx,.txt,.pdf"></div>
                </div>
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Skill modal --}}
<div class="am-modal" id="editepmloyeeskills" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:600px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تعديل المهارة</h4>
        </div>
        <form method="POST" action="{{ route('update-employes-skill') }}" style="display:contents;">
            @csrf
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-6"><label>معرف الموظف</label><input readonly name="editempid" type="number" class="form-control">
                        <input type="hidden" name="employskillid" value=""></div>
                    <div class="col-lg-6"><label>المهارة</label><input type="text" name="editempskill" class="form-control"></div>
                </div>
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Training modal --}}
<div class="am-modal" id="editepmloyeetraining" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:720px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تعديل التدريب</h4>
        </div>
        <form method="POST" action="{{ route('update-employes-training') }}" style="display:contents;">
            @csrf
            <div class="am-modal__body" style="padding:20px;">
                <div class="form-group row">
                    <div class="col-lg-6"><label>معرف الموظف</label>
                        <input type="hidden" name="edittrainid">
                        <input type="number" readonly class="form-control" name="editempidt">
                    </div>
                    <div class="col-lg-6"><label>تاريخ التدريب</label><input type="date" max="2999-12-31" class="form-control" name="edittraningdate"></div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12"><label>تفاصيل التدريب</label><input type="text" class="form-control" name="edittraningdetails"></div>
                </div>
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">إلغاء</button>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
            </div>
        </form>
    </div>
</div>

{{-- CV modal --}}
<div class="am-modal" id="cvModal" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:900px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-file-pdf"></i></span>
            <h4 class="am-modal__title">عرض السيرة الذاتية</h4>
        </div>
        <div class="am-modal__body" style="padding:0;">
            <iframe id="cvIframe" style="width:100%;height:600px;border:none;"></iframe>
        </div>
        <div class="am-modal__footer">
            <a id="downloadLink" href="#" download class="am-btn am-btn-outline"><i class="fa fa-download"></i> تنزيل</a>
            <button type="button" class="am-btn am-btn-primary am-modal-close">إغلاق</button>
        </div>
    </div>
</div>

<script>
// Tabs
document.querySelectorAll('.am-tab').forEach(function(btn){
    btn.addEventListener('click', function(){
        document.querySelectorAll('.am-tab').forEach(function(b){ b.classList.remove('active'); });
        document.querySelectorAll('.am-tab-panel').forEach(function(p){ p.classList.remove('active'); });
        btn.classList.add('active');
        document.querySelector('[data-panel="'+btn.getAttribute('data-tab')+'"]').classList.add('active');
    });
});

// Toggle forms
[['toggleEmpForm','newEmpForm','cancelEmpForm'],['toggleSklForm','newSklForm','cancelSklForm'],['toggleTrnForm','newTrnForm','cancelTrnForm']].forEach(function(ids){
    var t=document.getElementById(ids[0]),f=document.getElementById(ids[1]),c=document.getElementById(ids[2]);
    t&&t.addEventListener('click',function(){f.classList.toggle('open');});
    c&&c.addEventListener('click',function(){f.classList.remove('open');});
});

// Client-side search + pagination for each table
function debounce(fn,w){var t;return function(){var c=this,a=arguments;clearTimeout(t);t=setTimeout(function(){fn.apply(c,a);},w);};}
function setupTable(searchId, tableId, pagId){
    var per=10, input=document.getElementById(searchId), tb=document.querySelector('#'+tableId+' tbody'), p=document.getElementById(pagId);
    if(!tb) return;
    var rows=Array.prototype.slice.call(tb.querySelectorAll('tr[data-search]')),F=rows.slice(),pg=1;
    function r(){var T=F.length,TP=Math.max(1,Math.ceil(T/per));if(pg>TP)pg=TP;rows.forEach(function(x){x.style.display='none';});F.slice((pg-1)*per,pg*per).forEach(function(x){x.style.display='';});var fr=T===0?0:(pg-1)*per+1,to=Math.min(pg*per,T);var h='<div class="am-pagination__info">عرض <strong>'+fr+'–'+to+'</strong> من <strong>'+T+'</strong></div><div class="am-pagination__nav">';h+='<button data-p="'+(pg-1)+'" '+(pg<=1?'disabled':'')+'>‹</button>';var s=Math.max(1,pg-2),e=Math.min(TP,s+4);s=Math.max(1,e-4);for(var q=s;q<=e;q++)h+='<button data-p="'+q+'" '+(q===pg?'class="active"':'')+'>'+q+'</button>';h+='<button data-p="'+(pg+1)+'" '+(pg>=TP?'disabled':'')+'>›</button></div>';p.innerHTML=h;}
    input&&input.addEventListener('input',debounce(function(){var q=this.value.trim().toLowerCase();F=q===''?rows.slice():rows.filter(function(x){return x.getAttribute('data-search').indexOf(q)!==-1;});pg=1;r();},250));
    p&&p.addEventListener('click',function(e){var b=e.target.closest('button[data-p]');if(!b||b.disabled)return;var q=parseInt(b.getAttribute('data-p'),10);if(!isNaN(q)&&q>=1){pg=q;r();}});
    r();
}
setupTable('amEmpSearch','amEmpTable','amEmpPagination');
setupTable('amSklSearch','amSklTable','amSklPagination');
setupTable('amTrnSearch','amTrnTable','amTrnPagination');

// View handlers
function amEmpView(d){
    document.getElementById('vemp-surname').textContent = d.surname||'—';
    document.getElementById('vemp-first').textContent = d.first_name||'—';
    document.getElementById('vemp-num').textContent = d.empNumber||'—';
    document.getElementById('vemp-email').textContent = d.email||'—';
    document.getElementById('vemp-start').textContent = d.startDate ? new Date(d.startDate).toLocaleDateString() : '—';
    document.getElementById('vemp-job').textContent = d.jobdetails||'—';
    document.getElementById('viewEmpModal').classList.add('open');
}
function amEmpEdit(d){
    $("#editproject").val(d.id);
    ['empNumber','first_name','startDate','surname'].forEach(function(k){ $("#editepmloyee input[name='"+k+"']").val(d[k]||''); });
    $("#jobdetails2").val(d.jobdetails||'');
    document.getElementById('editepmloyee').classList.add('open');
}
function amSklEdit(d){
    $("input[name='editempid']").val(d.empNumber);
    $("input[name='editempskill']").val(d.empskill);
    $("input[name='employskillid']").val(d.skill_id);
    document.getElementById('editepmloyeeskills').classList.add('open');
}
function amTrnEdit(d){
    $("input[name='editempidt']").val(d.empNumber);
    $("input[name='edittraningdate']").val(d.traningdate);
    $("input[name='edittraningdetails']").val(d.traningdetails);
    $("input[name='edittrainid']").val(d.traning_id);
    document.getElementById('editepmloyeetraining').classList.add('open');
}

// CV viewer
function viewCV(cvUrl){
    document.getElementById('cvIframe').src = cvUrl;
    document.getElementById('downloadLink').href = cvUrl;
    document.getElementById('cvModal').classList.add('open');
}

// Extra POST param support on am-confirm-delete
document.addEventListener('submit', function(e){
    var f = e.target;
    if (f.classList && f.classList.contains('am-confirm-form-extra')) {
        var extra = f.getAttribute('data-extra');
        if (extra) {
            extra.split('&').forEach(function(kv){
                var p = kv.split('=');
                if (p.length === 2) {
                    var i = document.createElement('input');
                    i.type = 'hidden'; i.name = p[0]; i.value = p[1];
                    f.appendChild(i);
                }
            });
        }
    }
}, true);

// Employee number validation
let userId = "{{ $urlparam['userid'] }}";
let ajaxCall = null;
$('input[name="empNumber"]').blur(function(){
    let empNumber = $(this).val();
    let type = $(this).data('type');
    let empId = type === 'edit' ? $('#editproject').val() : '';
    let data = { empNumber, type, userId, _token: "{{ csrf_token() }}", empId };
    if (ajaxCall != null) ajaxCall.abort();
    ajaxCall = $.ajax({
        method: 'get',
        url: '{{ url("/check-emp-number") }}',
        data,
        success: function(response) {
            $("#emp_err_msg").remove();
            if (response.status == 0) {
                let cls = `.${type}-emp-number-div`;
                $(cls).append(`<p id="emp_err_msg" style="color:var(--am-danger);font-size:11px;">${response.message}</p>`);
                $('input[name="empNumber"]').val('');
            }
        }
    });
});
</script>

@endsection
