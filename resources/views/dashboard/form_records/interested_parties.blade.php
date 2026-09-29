@extends('dashboard.layouts.app')

@section('content')
<div class="am-content">

    <div class="am-page-header">
        <div>
            <h2>الأطراف المعنية</h2>
        </div>
    </div>

    <div class="am-card" style="padding:16px 20px;margin-bottom:16px;background:rgba(46,59,154,0.04);border:1px solid rgba(46,59,154,0.12);">
        <div style="display:flex;gap:12px;align-items:flex-start;">
            <span style="width:36px;height:36px;flex-shrink:0;border-radius:10px;background:var(--am-primary-tint);color:var(--am-primary);display:inline-flex;align-items:center;justify-content:center;font-size:15px;">
                <i class="fa fa-info-circle"></i>
            </span>
            <div style="font-size:13px;color:var(--am-text);line-height:1.55;">
                <p style="margin:0 0 8px 0;">يتطلب القسم 4.2 من شهادة الآيزو القياسية (ISO9001:2015) فهم احتياجات الأطراف المعنية وتوقعاتها. ويمكن توثيق مثل هذه المعلومات كما ترغب في هذا السجل. أما دليل الجودة في القسم 4،2،2 فهو يحدد من هي هذه الأطراف المعنية. </p>
                <p style="margin:0;">لإضافة سجل، يرجى النقر على زر "إضافة أطراف معنية". لتعديل سجل، يرجى النقر على أيقونة التعديل الخاصة بالقيد المراد تعديله. </p>
            </div>
        </div>
    </div>

    {{-- Toolbar + Add form --}}
    <div class="am-card" style="margin-bottom:16px;">
        <div class="am-card__toolbar">
            <button type="button" class="am-btn am-btn-primary" id="toggleIpForm">
                <i class="fa fa-plus"></i> إضافة أطراف معنية
            </button>
        </div>

        <div class="am-inline-form" id="newIpForm" style="margin:16px 20px;">
            <form action="{{route('interestedform')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div style="grid-column:1/-1;">
                        <label>الطرف المعني:</label>
                        <input type="text" name="interestedparty" required class="form-control"  placeholder="(يرجى إدخال الطرف المعني، مثل العملاء، المزودين، الموظفين)">
                    </div>
                </div>
                <div class="form-row">
                    <div style="grid-column:1/-1;">
                        <label>الاحتياجات والتوقعات </label>
                        <input type="text" name="needs" class="form-control"  required placeholder="يرجى إدخال الاحتياجات والتوقعات">
                    </div>
                </div>
                <div class="form-actions">
                    <button type="reset" class="am-btn am-btn-outline am-btn-sm" id="cancelIpForm">إلغاء </button>
                    <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="fa fa-check"></i> رسال </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Table card --}}
    <div class="am-card">
        <div class="am-table-wrap">
            <table class="am-table" id="kt_table_agent">
                <thead>
                    <tr>
                        <th>رقم سري</th>
                        <th>إضافة أطراف معنية </th>
                        <th>الاحتياجات والتوقعات </th>
                        <th>تم إنشاء هذا السجل في</th>
                        <th>فعل</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter=0; ?>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($interested as $data)
                    <?php $counter++; ?>
                    <tr>
                        <td><span class="am-cell-sub">{{ $i++}}</span></td>
                        <td><span class="am-cell-primary">{{ $data->interested_party}}</span></td>
                        <td><span class="am-cell-sub">{{ $data->needs}}</span></td>
                        <td><span class="am-chip info">{{date('d/m/Y h:i', strtotime($data->created_at))}}</span></td>
                        <td>
                            <div class="am-actions">
                                <button type="button" class="am-icon-btn" title="Edit" onclick="getEid({{$data}});"><i class="fa fa-pen"></i></button>
                                <button type="button" class="am-icon-btn" title="View" onclick="viewinterested({{$data}});"><i class="fa fa-eye"></i></button>
                                <button type="button" class="am-icon-btn danger" title="delete" onclick="deleteModal({{$data}});"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- Delete Confirmation Modal --}}
<div class="am-modal" id="deleteRequirment" role="dialog" aria-modal="true">
    <div class="am-modal__box">
        <div class="am-modal__header">
            <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
            <h4 class="am-modal__title">حذف الطرف المهتم</h4>
        </div>
        <div class="am-modal__body">
            هل أنت متأكد أنك تريد حذف هذا الإدخال؟
        </div>
        <div class="am-modal__footer">
            <button type="button" class="am-btn am-btn-outline am-modal-close">لا</button>
            <form action="{{route('deleteInterested')}} " method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="id" value="" id="re_id">
                <button type="submit" class="am-btn" style="background:var(--am-danger);color:#fff;"><i class="fa fa-trash"></i> نعم</button>
            </form>
        </div>
    </div>
</div>

{{-- Edit Modal --}}
<div class="am-modal" id="editinterestedmodal" role="dialog" aria-modal="true">
    <div class="am-modal__box am-form" style="max-width:560px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
            <h4 class="am-modal__title">تحرير تفاصيل الأطراف المهتمة</h4>
        </div>
        <form action="{{route('interestedUpdate')}}" method="POST" style="display:contents;">
            @csrf
            <div class="am-modal__body">
                <input type="hidden" value="" id="id_feild" name="id">
                <div style="margin-bottom:16px;">
                    <label>طرف مهتم:</label>
                    <input type="text" name="interestedparty" id="eIpParty" required class="form-control"  placeholder="يرجى إدخال الطرف المعني، مثل العملاء، المزودين، الموظفين:">
                </div>
                <div>
                    <label>الاحتياجات والتوقعات </label>
                    <input type="text" name="needs" id="eIpNeeds" required class="form-control"  placeholder="أدخل الحاجة والتوقعات:">
                </div>
            </div>
            <div class="am-modal__footer">
                <button type="button" class="am-btn am-btn-outline am-modal-close">يلغي</button>
                <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
            </div>
        </form>
    </div>
</div>

{{-- View Modal --}}
<div class="am-modal" id="viewinterestedparty" role="dialog" aria-modal="true">
    <div class="am-modal__box" style="max-width:520px;">
        <div class="am-modal__header">
            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
            <h4 class="am-modal__title">عرض تفاصيل الأطراف المهتمة</h4>
        </div>
        <div class="am-modal__body">
            <div style="margin-bottom:14px;">
                <p style="font-size:11.5px;letter-spacing:0.4px;color:var(--am-text-muted);margin:0 0 4px 0;font-weight:600;">طرف مهتم:</p>
                <p style="font-size:14px;color:var(--am-text);margin:0;font-weight:600;" id="vIpParty">—</p>
            </div>
            <div>
                <p style="font-size:11.5px;letter-spacing:0.4px;color:var(--am-text-muted);margin:0 0 4px 0;font-weight:600;">الاحتياجات والتوقعات:</p>
                <p style="font-size:13.5px;color:var(--am-text);margin:0;" id="vIpNeeds">—</p>
            </div>
        </div>
        <div class="am-modal__footer">
            <button type="button" class="am-btn am-btn-outline am-modal-close">يغلق</button>
        </div>
    </div>
</div>
@endsection

<script>
    // ---- Modal helpers ----
    document.addEventListener('click', function(e) {
        var close = e.target.closest('.am-modal-close');
        if (close) { var m = close.closest('.am-modal'); if (m) m.classList.remove('open'); return; }
        if (e.target.classList && e.target.classList.contains('am-modal')) e.target.classList.remove('open');
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') document.querySelectorAll('.am-modal.open').forEach(function(m){ m.classList.remove('open'); });
    });

    // ---- Add form toggle ----
    (function() {
        var btn    = document.getElementById('toggleIpForm');
        var cancel = document.getElementById('cancelIpForm');
        var form   = document.getElementById('newIpForm');
        btn    && btn.addEventListener('click', function() { form.classList.toggle('open'); });
        cancel && cancel.addEventListener('click', function() { form.classList.remove('open'); });
    })();

    function getEid(data){
        document.getElementById('id_feild').value = data.id || '';
        document.getElementById('eIpParty').value = data.interested_party || '';
        document.getElementById('eIpNeeds').value = data.needs || '';
        document.getElementById('editinterestedmodal').classList.add('open');
    }

    function viewinterested(data){
        document.getElementById('vIpParty').textContent = data.interested_party || '—';
        document.getElementById('vIpNeeds').textContent = data.needs || '—';
        document.getElementById('viewinterestedparty').classList.add('open');
    }

    function deleteModal(data){
        document.getElementById('re_id').value = data.id || '';
        document.getElementById('deleteRequirment').classList.add('open');
    }
</script>
