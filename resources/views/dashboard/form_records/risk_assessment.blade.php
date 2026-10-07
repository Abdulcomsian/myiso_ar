@extends('dashboard.layouts.app')

@section('content')
    <!-- begin:: Content -->
    <style>
        .risk_assessment_from_div .row:nth-child(even) {
            background: #FFF !important;
            padding: 5px;
        }
    </style>
    <div class="am-content">
        <!--Begin::Dashboard 1-->
        <!--Begin::Section-->
        <div class="am-page-header">
            <div style="display:flex;align-items:center;gap:12px;">
                <button type="button" class="am-page-guide-btn"
                    data-toggle="modal" data-target="#amPageGuide"
                    title="تقييم المخاطر" aria-label="تقييم المخاطر">
                    <i class="fa fa-info-circle"></i>
                </button>
                <div>
                    <h2>تقييم المخاطر</h2>
                </div>
            </div>
        </div>
        <section>
            <div class="row text-right">
                <div class="col-lg-12">
                    <div class="am-card" style="margin-bottom:16px;">
                        <div class="am-card__toolbar">
                            <div class="text-right" style="width:100%;">
                                <a onclick="riskAssessment()" class="am-btn am-btn-primary">إضافة تقييم للمخاطر</a>
                            </div>
                        </div>
                        <div class="risk_assessment_from_div">
                            <form action="{{ route('assessment') }} " method="POST" class="addForm am-inline-form open" style="margin:16px 20px;">
                                @csrf
                                                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>رقم الوظيفة:</label>
                                            <input type="text" min="1" class="form-control validate_number"
                                                name="jobNumber" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>التاريخ (شهر/يوم/سنة):</label>
                                            <input type="date" max="2999-12-31" class="form-control" name="date"
                                                required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>موعد التسليم (شهر/يوم/سنة):</label>
                                            <input type="date" max="2999-12-31" class="form-control"
                                                placeholder="Enter Comment" name="dateDevelry" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>هل يمكنني تلبية متطلبات معايير الجودة؟</label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="qualitySatandard" value="Yes" required>
                                                    نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="qualitySatandard" value="No"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="qualitySatandard" value="NA"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 2;">
                                        <div class="form-group">
                                            <label>تعليقات:</label>
                                            <input type="text" class="form-control" placeholder="أدخل التعليق"
                                                name="commentsstandard">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label> هل يمكنني الالتزام بموعد التسليم؟</label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="delevryStandard" value="yes" required>
                                                    نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="delevryStandard" value="no"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="delevryStandard" value="NA"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 2;">
                                        <div class="form-group">
                                            <label>تعليقات:</label>
                                            <input type="text" class="form-control" placeholder="أدخل التعليق"
                                                name="commentsdelvery">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>هل يمكنني تلبية متطلبات السعر؟</label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="priceRequiremnt" value="yes" required>
                                                    نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="priceRequiremnt" value="No"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="priceRequiremnt" value="NA"> لا ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 2;">
                                        <div class="form-group">
                                            <label>تعليقات:</label>
                                            <input type="text" class="form-control" placeholder="أدخل التعليق"
                                                name="commentprice">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>هل يمكن اعتبار الأطراف المعنية متأثرة؟</label>
                                            <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="interestedDeemed" value="Yes"
                                                        required> نعم
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="interestedDeemed" value="No"> لا
                                                </label>
                                                <label style="display:inline-flex;gap:4px;align-items:center;">
                                                    <input type="radio" name="interestedDeemed" value="NA"> لا
                                                    ينطبق
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="grid-column:span 2;">
                                        <div class="form-group">
                                            <label>تعليقات:</label>
                                            <input type="text" class="form-control" placeholder="أدخل التعليق"
                                                name="commentsDeemed">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div style="grid-column:1/-1;">
                                        <div class="form-group">
                                            <label>التعليق على القرار:</label>
                                            <input type="text" class="form-control" placeholder="أدخل التعليق"
                                                name="DecisionComment" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div>
                                        <div class="form-group">
                                            <label>احتمالية المخاطرة (انظر التعليمات) – 4 = محتمل جدًا، 3 = محتمل، 2 = غير
                                                متوقع، 1 = غير متوقع نهائيًا:</label>
                                            <!--<input type="number" class="form-control" name="RiskProbability">-->
                                            <select name="RiskProbability" id="RiskProbability" class="form-control"
                                                required>
                                                <option value="">حدد واحدًا</option>

                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label>شدة المخاطر (انظر التعليمات) – 4 = كارثيّة، 3 = خطيرة، 2 = هامشية، 1 = لا
                                                تُذكر:</label>
                                            <!--<input type="number" class="form-control" name="riskSeverity">-->

                                            <select name="riskSeverity" id="riskSeverity" class="form-control" required>
                                                <option value="">حدد واحدًا</option>

                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>

                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions" style="display:flex;justify-content:flex-end;gap:8px;">
                                    <button onclick="riskAssessment()" type="reset" class="am-btn am-btn-outline am-btn-sm" data-dismiss="modal">يلغي</button>
                                    <button type="submit" class="am-btn am-btn-primary am-btn-sm">يُقدِّم</button>
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
                                            <th>رقم معرف المخاطرة</th>
                                            <th>رقم الوظيفة</th>
                                            <th>تاريخ الطلب</th>
                                            <th> هل تمت الموافقة على الجودة؟</th>
                                            <th>هل تمت الموافقة على التسليم؟</th>
                                            <th>هل تمت الموافقة على السعر؟</th>
                                            <th>القرار بشأن المخاطرة</th>
                                            <th> الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($assessment as $data)
                                            <tr>
                                                <td><span class="am-cell-sub">{{ $i }}</span></td>
                                                <!--<td><span class="am-cell-sub">{{ $data->id }}</span></td>-->
                                                <td><span class="am-cell-primary">{{ $data->jobNumber }}</span></td>

                                                <td><span class="am-chip info">{{ date('d/m/Y', strtotime($data->date)) }}</span></td>
                                                <td><span class="am-cell-sub">{{ ucfirst($data->qualitySatandard) }}</span></td>
                                                <td><span class="am-cell-sub">{{ ucfirst($data->delevryStandard) }}</span></td>
                                                <td><span class="am-cell-sub">{{ ucfirst($data->priceRequiremnt) }}</span></td>
                                                <td><span class="am-cell-sub">{{ ucfirst($data->DecisionComment) }}</span></td>
                                                <td style="text-align:left;white-space:nowrap;">
                                                    <button class="am-icon-btn"
                                                        data-toggle="modal" data-target="#viewData-{{ $data->id }}"
                                                        id="viewData_{{ $data->id }}" title="View" type="button">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <!--EDIT MODAL-->
                                                    <div class="modal fade text-right" id="viewData-{{ $data->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" style="max-width:820px;" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header am-modal__header">
                                                                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                                                    <h5 class="modal-title am-modal__title" id="exampleModalLabel2">عرض
                                                                        تقييمات المخاطر</h5>
                                                                    </div>
                                                                <form>

                                                                    <div class="modal-body ">
                                                                        {{-- print_r($data) - --}}
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>رقم الوظيفة:</label>
                                                                                    <input disabled type="text"
                                                                                        class="form-control"
                                                                                        name="jobNumber"
                                                                                        value="{{ $data->jobNumber }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>التاريخ
                                                                                        (شهر/يوم/سنة):</label>
                                                                                    <input disabled type="date"
                                                                                        max="2999-12-31"
                                                                                        class="form-control"
                                                                                        name="date"
                                                                                        value="{{ $data->date }}"
                                                                                        disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label> هل يمكنني تلبية متطلبات معايير
                                                                                        الجودة؟: </label>
                                                                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="qualitySatandard"
                                                                                                value="Yes"
                                                                                                {{ $data->qualitySatandard == 'Yes' ? 'checked' : '' }}>
                                                                                            نعم
                                                                                        </label>
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="qualitySatandard"
                                                                                                value="No"
                                                                                                {{ $data->qualitySatandard == 'No' ? 'checked' : '' }}>
                                                                                            لا
                                                                                        </label>
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="qualitySatandard"
                                                                                                value="NA"
                                                                                                {{ $data->qualitySatandard == 'NA' ? 'checked' : '' }}>
                                                                                            لا ينطبق
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>تعليقات:</label>
                                                                                    <input disabled type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Enter Comment"
                                                                                        name="commentsstandard"
                                                                                        value="{{ $data->commentsstandard }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label> هل يمكنني الالتزام بموعد
                                                                                        التسليم؟</label>
                                                                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="delevryStandard"
                                                                                                value="yes"
                                                                                                {{ $data->delevryStandard == 'yes' ? 'checked' : '' }}>
                                                                                            نعم
                                                                                        </label>
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="delevryStandard"
                                                                                                value="no"
                                                                                                {{ $data->delevryStandard == 'no' ? 'checked' : '' }}>
                                                                                            لا
                                                                                        </label>
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="delevryStandard"
                                                                                                value="NA"
                                                                                                {{ $data->delevryStandard == 'NA' ? 'checked' : '' }}>
                                                                                            لا ينطبق
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>تعليقات:</label>
                                                                                    <input disabled type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Enter Comment"
                                                                                        name="commentsdelvery"
                                                                                        value="{{ $data->commentsdelvery }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>هل يمكنني تلبية متطلبات السعر؟
                                                                                        ({{ $data->priceRequiremnt }})</label>
                                                                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="priceRequiremnt"
                                                                                                value="yes"
                                                                                                {{ $data->priceRequiremnt == 'yes' ? 'checked' : '' }}>
                                                                                            نعم
                                                                                        </label>
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="priceRequiremnt"
                                                                                                value="No"
                                                                                                {{ $data->priceRequiremnt == 'No' ? 'checked' : '' }}>
                                                                                            لا
                                                                                        </label>
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="priceRequiremnt"
                                                                                                value="NA"
                                                                                                {{ $data->priceRequiremnt == 'NA' ? 'checked' : '' }}>
                                                                                            لا ينطبق
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>تعليقات:</label>
                                                                                    <input disabled type="text"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل التعليق"
                                                                                        name="commentprice"
                                                                                        value="{{ $data->commentprice }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>هل يمكن اعتبار الأطراف المعنية
                                                                                        متأثرة؟</label>
                                                                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="interestedDeemed"
                                                                                                value="Yes"
                                                                                                {{ $data->interestedDeemed == 'Yes' ? 'checked' : '' }}>
                                                                                            نعم
                                                                                        </label>
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="interestedDeemed"
                                                                                                value="No"
                                                                                                {{ $data->interestedDeemed == 'No' ? 'checked' : '' }}>
                                                                                            لا
                                                                                        </label>
                                                                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                                                                            <input disabled type="radio"
                                                                                                name="interestedDeemed"
                                                                                                value="NA"
                                                                                                {{ $data->interestedDeemed == 'NA' ? 'checked' : '' }}>
                                                                                            لا ينطبق
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>تعليقات:</label>
                                                                                    <input disabled type="text"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل التعليق"
                                                                                        name="commentsDeemed"
                                                                                        value="{{ $data->commentsDeemed }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>التعليق على القرار:</label>
                                                                                    <input disabled type="text"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل التعليق"
                                                                                        name="DecisionComment"
                                                                                        value="{{ $data->DecisionComment }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>موعد التسليم
                                                                                        (شهر/يوم/سنة):</label>
                                                                                    <input disabled type="date"
                                                                                        max="2999-12-31"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل التعليق"
                                                                                        name="dateDevelry"
                                                                                        value="{{ $data->dateDevelry }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>احتمالية المخاطرة (انظر
                                                                                        التعليمات) – 4 = محتمل جدًا، 3 =
                                                                                        محتمل، 2 = غير متوقع، 1 = غير متوقع
                                                                                        نهائيًا:</label>
                                                                                    <!--<input disabled type="number" class="form-control" name="RiskProbability">-->
                                                                                    <select name="RiskProbability"
                                                                                        id="RiskProbability"
                                                                                        class="form-control" disabled>
                                                                                        <option value="">حدد واحدًا
                                                                                        </option>

                                                                                        <option value="4"
                                                                                            {{ $data->RiskProbability == '4' ? 'selected="selected"' : '' }}>
                                                                                            4</option>
                                                                                        <option value="3"
                                                                                            {{ $data->RiskProbability == '3' ? 'selected="selected"' : '' }}>
                                                                                            3</option>
                                                                                        <option value="2"
                                                                                            {{ $data->RiskProbability == '2' ? 'selected="selected"' : '' }}>
                                                                                            2</option>
                                                                                        <option value="1"
                                                                                            {{ $data->RiskProbability == '1' ? 'selected="selected"' : '' }}>
                                                                                            1</option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label>شدة المخاطر (انظر التعليمات) – 4
                                                                                        = كارثيّة، 3 = خطيرة، 2 = هامشية، 1
                                                                                        = لا تُذكر:</label>
                                                                                    <!--<input disabled type="number" class="form-control" name="riskSeverity">-->

                                                                                    <select name="riskSeverity"
                                                                                        id="riskSeverity"
                                                                                        class="form-control" disabled>
                                                                                        <option value="">حدد واحدًا
                                                                                        </option>

                                                                                        <option value="4"
                                                                                            {{ $data->riskSeverity == '4' ? 'selected="selected"' : '' }}>
                                                                                            4</option>
                                                                                        <option value="3"
                                                                                            {{ $data->riskSeverity == '3' ? 'selected="selected"' : '' }}>
                                                                                            3</option>
                                                                                        <option value="2"
                                                                                            {{ $data->riskSeverity == '2' ? 'selected="selected"' : '' }}>
                                                                                            2</option>
                                                                                        <option value="1"
                                                                                            {{ $data->riskSeverity == '1' ? 'selected="selected"' : '' }}>
                                                                                            1</option>

                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer am-modal__footer">
                                                                        <button type="button" class="am-btn am-btn-outline"
                                                                            data-dismiss="modal">يغلق</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--EDIT MODAL ENDS-->
                                                    <button class="am-icon-btn"
                                                        type="button" onclick="EditData({{ $data }});"
                                                        title="Edit">
                                                        <i class="fa fa-pen"></i>
                                                    </button>


                                                    <button data-toggle="modal"
                                                        data-target="#confirm-{{ $data->id }}"
                                                        id="remove_{{ $data->id }}" title="Delete"
                                                        class="am-icon-btn danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <!-- Delete Modal -->

                                                    <div class="modal fade modal-mini modal-primary"
                                                        id="confirm-{{ $data->id }}" tabindex="-1" role="dialog"
                                                        aria-labelledby="confirm" aria-hidden="true">
                                                        <div class="modal-dialog" style="max-width:460px;">
                                                            <div class="modal-content">
                                                                <form action="{{ route('delete_assesment') }}"
                                                                    method="post">
                                                                    <div class="modal-header am-modal__header"> @csrf
                                                                        <span class="am-modal__icon"><i class="fa fa-exclamation-triangle"></i></span>
                                                                        <div class="modal-profile am-modal__title"> حذف إدخال </div>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <p>هل أنت متأكد أنك تريد حذف هذا الإدخال؟</p>
                                                                    </div>
                                                                    <div class="modal-footer am-modal__footer">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $data->id }}">
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
                                            @php $i++  @endphp
                                        @empty
                                            <tr>
                                                <td colspan="8">
                                                    <div class="am-empty">
                                                        <i class="fa fa-user-shield"></i>
                                                        <p>لم يتم تسجيل أي تقييمات مخاطر بعد.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                            @include('dashboard.form_records.partials.am_paginator', ['paginator' => $assessment])
                        </div>
                    </div>


        </section>

        <!--End::Section-->
    </div>


    {{-- Page guide --}}
    <div class="modal fade text-right" id="amPageGuide" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="max-width:600px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon am-page-guide-icon"><i class="fa fa-info-circle"></i></span>
                    <div>
                        <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.4px;color:var(--am-text-muted);font-weight:600;">النماذج والسجلات</div>
                        <h5 class="modal-title am-modal__title" style="color:var(--am-primary);">تقييمات المخاطر</h5>
                    </div>
                </div>
                <div class="modal-body" style="color:var(--am-text);">
                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما هو؟</h5>
                    <p style="margin:0 0 16px;">على الرغم من اسمه، لا يتعلق هذا التقييم بالسلامة، بل هو تحقّق من العمل أو العقد قبل الموافقة على قبوله: هل يمكنك تحقيق مستوى الجودة المطلوب، والالتزام بموعد التسليم، وتحقيق جدوى السعر؟ لينتهي بقرار القبول أو الرفض.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">ما أهميته؟</h5>
                    <p style="margin:0 0 16px;">معظم المشكلات المتعلقة بالعقود تكون واضحة قبل بدء التنفيذ. ويمنحك هذا التحقق مبررًا للاعتذار عن عمل قد يتعثر، ويترك سجلًا يُثبت أن القرار اتُّخذ عن دراسة لا عن تخمين.</p>

                    <h5 style="font-size:13px;font-weight:600;color:var(--am-primary);margin:0 0 6px;">الخطوات الأساسية</h5>
                    <ul style="margin:0;padding-inline-start:18px;list-style:disc;color:var(--am-text);font-size:13.5px;line-height:1.5;">
                        <li style="margin-bottom:6px;">انقر على إضافة تقييم مخاطر عند ورود أي عمل أو عقد مهم.</li>
                        <li style="margin-bottom:6px;">أدخِل رقم العمل والتاريخ.</li>
                        <li style="margin-bottom:6px;">قيّم المخاطر من حيث الجودة والتسليم والسعر.</li>
                        <li style="margin-bottom:6px;">اطّلع على درجة المخاطر الإجمالية الناتجة.</li>
                        <li style="margin-bottom:6px;">سجّل القرار: مقبول، أو مرفوض، أو مقبول بشروط.</li>
                        <li>لكل ما قد يُلحق الأذى بالأشخاص، استخدم تقييمات مخاطر الحوادث بدلًا من ذلك.</li>
                    </ul>
                </div>
                <div class="modal-footer am-modal__footer">
                    <button type="button" class="am-btn am-btn-outline" data-dismiss="modal">يغلق</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-right" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:900px;" role="document">
            <div class="modal-content">
                <div class="modal-header am-modal__header">
                    <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-pen"></i></span>
                    <h5 class="modal-title am-modal__title" id="exampleModalLabel">تحرير تقييمات المخاطر</h5>
                    </div>
                <form action="{{ route('editassessment') }} " method="POST">
                    @csrf

                    <div class="modal-body ">
                        <input type="hidden" name="id" value="" id="id_feild">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>رقم الوظيفة:</label>
                                    <input type="text" min="1" class="form-control validate_number"
                                        name="jobNumber">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>التاريخ (شهر/يوم/سنة):</label>
                                    <input type="date" max="2999-12-31" class="form-control" name="date" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هل يمكنني تلبية متطلبات معايير الجودة؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="qualitySatandard" value="Yes" required> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="qualitySatandard" value="No"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="qualitySatandard" value="NA"> لا ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تعليقات:</label>
                                    <input type="text" class="form-control" placeholder="أدخل التعليق"
                                        name="commentsstandard">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هل يمكنني الالتزام بموعد التسليم؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="delevryStandard" value="yes" required> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="delevryStandard" value="no"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="delevryStandard" value="NA"> لا ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تعليقات:</label>
                                    <input type="text" class="form-control" placeholder="أدخل التعليق"
                                        name="commentsdelvery">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>هل يمكنني تلبية متطلبات السعر؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="priceRequiremnt" value="yes" required> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="priceRequiremnt" value="No"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="priceRequiremnt" value="NA"> لا ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تعليقات:</label>
                                    <input type="text" class="form-control" placeholder="أدخل التعليق"
                                        name="commentprice">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label> هل يمكن اعتبار الأطراف المعنية متأثرة؟</label>
                                    <div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="interestedDeemed" value="Yes" required> نعم
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="interestedDeemed" value="No"> لا
                                        </label>
                                        <label style="display:inline-flex;gap:4px;align-items:center;">
                                            <input type="radio" name="interestedDeemed" value="NA"> لا ينطبق
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>تعليقات:</label>
                                    <input type="text" class="form-control" placeholder="أدخل التعليق"
                                        name="commentsDeemed">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>التعليق على القرار:</label>
                                    <input type="text" class="form-control" placeholder="أدخل التعليق"
                                        name="DecisionComment" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>موعد التسليم (شهر/يوم/سنة):</label>
                                    <input type="date" max="2999-12-31" class="form-control"
                                        placeholder="أدخل التعليق" name="dateDevelry" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>احتمالية المخاطرة (انظر التعليمات) – 4 = محتمل جدًا، 3 = محتمل، 2 = غير متوقع، 1
                                        = غير متوقع نهائيًاP:</label>
                                    <!--<input type="number" class="form-control" name="RiskProbability">-->
                                    <select name="RiskProbability" id="RiskProbability" class="form-control" required>
                                        <option value="">حدد واحدًا</option>

                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>شدة المخاطر (انظر التعليمات) – 4 = كارثيّة، 3 = خطيرة، 2 = هامشية، 1 = لا
                                        تُذكر:</label>
                                    <!--<input type="number" class="form-control" name="riskSeverity">-->

                                    <select name="riskSeverity" id="riskSeverity" class="form-control" required>
                                        <option value="">حدد واحدًا</option>

                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>

                                    </select>

                                </div>
                            </div>



                        </div>


                    </div>
                    <div class="modal-footer am-modal__footer">
                        <button type="button" class="am-btn am-btn-outline" data-dismiss="modal"
                            style="margin-right:20px;">يلغي</button>
                        <button type="submit" class="am-btn am-btn-primary"><i class="fa fa-check"></i> تحديث</button>
                    </div>
            </div>
                </form>
        </div>
    </div>


    {{--
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel2">View Risk Assessments</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
            </div>
            <form>

			<div class="modal-body ">
                <input disabled type="hidden" name="id"  value="" id="id_feild">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Job Number:</label>
								<input disabled type="text" class="form-control" name="jobNumber">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Date (MM/DD/YYY):</label>
								<input disabled type="date" max="2999-12-31" class="form-control" name="date">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Can I meet the quality standard?:</label>
									<div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="qualitySatandard" value="Yes" required> Yes
										</label>
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="qualitySatandard" value="No" required> No
										</label>
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="qualitySatandard" value="NA" required> NA
										</label>
									</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Comments:</label>
								<input disabled type="text" class="form-control"  placeholder="Enter Comment" name="commentsstandard">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Can I meet the delivery date?:</label>
									<div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="delevryStandard" value="yes" required> Yes
										</label>
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="delevryStandard" value="no" required> No
										</label>
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="delevryStandard" value="NA" required> NA
										</label>
									</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Comments:</label>
								<input disabled type="text" class="form-control"  placeholder="Enter Comment" name="commentsdelvery">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Can I meet the price?:</label>
									<div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="priceRequiremnt" value="yes" required> Yes
										</label>
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="priceRequiremnt" value="No" required> No
										</label>
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="priceRequiremnt" value="NA" required> NA
										</label>
									</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Comments:</label>
								<input disabled type="text" class="form-control"  placeholder="Enter Comment" name="commentprice">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Could interested parties be deemed affected?:</label>
									<div style="display:flex;gap:12px;font-size:13px;padding:6px 0;flex-wrap:wrap;">
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="interestedDeemed" value="Yes" required> Yes
										</label>
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="interestedDeemed" value="No" required> No
										</label>
										<label style="display:inline-flex;gap:4px;align-items:center;">
											<input disabled type="radio" name="interestedDeemed" value="NA" required> NA
										</label>
									</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Comments:</label>
								<input disabled type="text" class="form-control"  placeholder="Enter Comment" name="commentsDeemed">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Decision Comment:</label>
								<input disabled type="text" class="form-control"  placeholder="Enter Comment" name="DecisionComment">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Delivery Date (MM/DD/YYY):</label>
								<input disabled type="date" max="2999-12-31" class="form-control"  placeholder="Enter Comment" name="dateDevelry">
							</div>
						</div>
					</div>

								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>Risk Probability (see instructions) - 4 = Very likely, 3 = Likely, 2 = Not likely, 1 = Very unlikely:</label>
											<!--<input disabled type="number" class="form-control" name="RiskProbability">-->
											<select name="RiskProbability" id="RiskProbability" class="form-control" disabled>
											    <option value="">Select One</option>
											    
											    <option value="4">4</option>
											    <option value="3">3</option>
											    <option value="2">2</option>
											    <option value="1">1</option>
											    
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Risk Severity (see instructions) - 4 = Catastrophic, 3 = Critical, 2 = Marginal, 1 = Negligible:</label>
											<!--<input disabled type="number" class="form-control" name="riskSeverity">-->
											
											<select name="riskSeverity" id="riskSeverity" class="form-control" disabled>
											    <option value="">Select One</option>
											    
											    <option value="4">4</option>
											    <option value="3">3</option>
											    <option value="2">2</option>
											    <option value="1">1</option>
											    
											</select>
											
										</div>
									</div>
								</div>
            </div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
		</div>
	</div>
</div>
- --}}

<style>
    .risk_assessment_from_div .row:nth-child(even) {
        background: #fff;
        padding: 5px;
    }
</style>
<script>
    function EditData(data) {
        console.log(data);

        $("#id_feild").val(data.id);
        $("input[name='DecisionComment']").val(data.DecisionComment);
        $("input[name='RiskProbability']").val(data.RiskProbability);
        $("input[name='commentprice']").val(data.commentprice);
        $("input[name='commentsDeemed']").val(data.commentsDeemed);
        $("input[name='commentsdelvery']").val(data.commentsdelvery);
        $("input[name='commentsstandard']").val(data.commentsstandard);
        $("input[name='date']").val(data.date);
        $("input[name='dateDevelry']").val(data.dateDevelry);
        $("input[name='jobNumber']").val(data.jobNumber);

        $("input[name='delevryStandard'][value=" + data.delevryStandard + "]").prop('checked', true);
        $("input[name='interestedDeemed'][value=" + data.interestedDeemed + "]").prop('checked', true);
        $("input[name='priceRequiremnt'][value=" + data.priceRequiremnt + "]").prop('checked', true);
        $("input[name='qualitySatandard'][value=" + data.qualitySatandard + "]").prop('checked', true);

        $("select[name='RiskProbability']").val(data.RiskProbability);
        $("select[name='riskSeverity']").val(data.riskSeverity);

        $("#editModal").modal('show');
        resetForm();

    }
    {{-- -    function viewData(data){
        // console.log(data);

        $("#id_feild").val(data.id);
         $("input[name='DecisionComment']").val(data.DecisionComment);
         $("input[name='RiskProbability']").val(data.RiskProbability);
         $("input[name='commentprice']").val(data.commentprice);
         $("input[name='commentsDeemed']").val(data.commentsDeemed);
         $("input[name='commentsdelvery']").val(data.commentsdelvery);
         $("input[name='commentsstandard']").val(data.commentsstandard);
         $("input[name='date']").val(data.date);
         $("input[name='dateDevelry']").val(data.dateDevelry);
         $("input[name='jobNumber']").val(data.jobNumber);

         $("input[name='delevryStandard'][value="+data.delevryStandard+"]").prop('checked',true);
         $("input[name='interestedDeemed'][value="+data.interestedDeemed+"]").prop('checked',true);
         $("input[name='priceRequiremnt'][value="+data.priceRequiremnt+"]").prop('checked',true);
         $("input[name='qualitySatandard'][value="+data.qualitySatandard+"]").prop('checked',true);

         $("select[name='RiskProbability']").val(data.RiskProbability);
         $("select[name='riskSeverity']").val(data.riskSeverity);

        $("#viewModal").modal('show');

    }
    --- --}}
</script>
@endsection
