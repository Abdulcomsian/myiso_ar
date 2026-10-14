{{-- The Requirements Due card's list. Its own partial so the pager can fetch
     it on its own, the way the Objectives card does.

     The rows are exactly what the card has always shown - the same records,
     the same columns, the same delete button. Only the paging is new. --}}
@if($requirement->isEmpty())
<div class="am-empty">
    <i class="fa fa-database"></i>
    <p>لا توجد متطلبات مستحقة.</p>
</div>
@else
<div class="am-table-wrap">
    <table class="am-table">
        <thead>
            <tr>
                <th>الرقم</th>
                <th>المتطلبات</th>
                <th>تاريخ الاستكمال</th>
                <th>التواتر (بالأشهر)</th>
                <th>تاريخ الاستحقاق</th>
                <th>الإجراء</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requirement as $index => $data)
                <tr>
                    <td>{{ $requirement->firstItem() + $index }}</td>
                    <td>{{ $data->requirment_title}}</td>
                    @php $d = strtotime($data->completion_date); @endphp
                    <td>{{date("d/m/Y", $d) }}</td>
                    <td>{{ $data->periods }}</td>
                    @php $d = strtotime("+$data->periods months",strtotime($data->completion_date)); @endphp
                    <td>{{ date("d/m/Y",$d)}}</td>
                    <td>
                        <a href="#" data-id="{{$data->id}}" class="delete_requirement am-btn am-btn-sm am-btn-danger" title="حذف">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@include('dashboard.partials.dash_list_footer', [
    'paginator'  => $requirement,
    'viewAllUrl' => url('/requirements_aspect'),
])
