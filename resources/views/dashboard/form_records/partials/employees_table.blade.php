{{-- The employees table on its own, so that searching and paging can fetch
     just this and swap it in - the same split the English page uses.

     The columns are the ones the Arabic page has always shown, in the order it
     has always shown them. Only the chrome around the table is new.

     The per-row modals (the CV viewer and the read-only summary) live inside
     the rows, as they did before, so they come and go with the rows they
     belong to. --}}
<div class="am-table-wrap">
    <table class="am-table" id="amEmpTable">
        <thead>
            <tr>
                <th style="width:170px;">رقم تعريف الموظف</th>
                <th style="width:150px;">اللقب</th>
                <th style="width:150px;">الاسم الأول</th>
                <th style="width:200px;">تاريخ البدء</th>
                <th style="width:240px;">الوصف الوظيفي</th>
                <th style="width:240px;">بريد إلكتروني</th>
                <th style="width:120px;">السيرة الذاتية</th>
                <th style="width:150px;">النشاط</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($userinfo as $item)
                <tr>
                    <td><span class="am-cell-sub">{{ $item->empNumber }}</span></td>
                    <td><span class="am-cell-primary">{{ $item->surname }}</span></td>
                    <td><span class="am-cell-sub">{{ $item->first_name }}</span></td>
                    <td><span class="am-chip info">{{ date('d/m/Y', strtotime($item->startDate)) }}</span></td>
                    <td><span class="am-cell-sub">{{ $item->jobdetails }}</span></td>
                    <td><span class="am-cell-sub">{{ $item->email }}</span></td>
                    <td>
                        @if (!empty($item->cv))
                            <?php
                                $path_info = explode('.', $item->cv);
                                if (($path_info[1] ?? '') == "pdf") {
                            ?>
                            <a target="_blank" style="color: blue;cursor: pointer;"
                                data-toggle="modal" data-target="#cv{{ $item->id }}">عرض
                                السيرة الذاتية</a>
                            <?php
                                } else {
                            ?>
                            <a target="_blank" download href="{{ asset($item->cv) }}">عرض
                                السيرة الذاتية</a>
                            <?php } ?>

                            <!-- Modal -->
                            <div class="modal fade text-right" id="cv{{ $item->id }}"
                                tabindex="-1" role="dialog" aria-labelledby="viewcvLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" style="max-width:720px;" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header am-modal__header">
                                            <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                            <h5 class="modal-title am-modal__title" id="viewcvLabel">عرض
                                                السيرة الذاتية</h5>
                                            <a data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="modal-body">
                                            <object data="{{ asset($item->cv) }}"
                                                type="application/pdf">
                                                <embed src="{{ asset($item->cv) }}"
                                                    type="application/pdf" />
                                            </object>
                                        </div>
                                        <div class="modal-footer am-modal__footer">
                                            <a href="{{ asset($item->cv) }}" download>
                                                <h5 class="modal-title"
                                                    style="float:right;text-align:Right;">تحميل
                                                    السيرة الذاتية</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            لاتوجد بيانات
                        @endif
                    </td>
                    <td style="text-align:left;white-space:nowrap;">
                        <div class="am-actions">
                            <button class="am-icon-btn" title="عرض تفاصيل الموظف"
                                data-toggle="modal" data-target="#employ{{ $item->id }}"><i
                                    class="fa fa-eye"></i>
                            </button>
                            <button onclick="getEid({{ json_encode($item) }});"
                                class="am-icon-btn" title="تحرير">
                                <i class="fa fa-pen"></i>
                            </button>
                            <button class="am-icon-btn danger"
                                onclick="deleteempl({{ $item->id }})"
                                title="حذف الموظف">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade text-right" id="employ{{ $item->id }}"
                            tabindex="-1" role="dialog" aria-labelledby="model1Label"
                            aria-hidden="true">
                            <div class="modal-dialog" style="max-width:720px;" role="document">
                                <div class="modal-content">
                                    <div class="modal-header am-modal__header">
                                        <span class="am-modal__icon" style="background:var(--am-primary-tint);color:var(--am-primary);"><i class="fa fa-eye"></i></span>
                                        <h5 class="modal-title am-modal__title">إجمالي
                                            الموظفين المدرجين</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-row">
                                            <div>
                                                <div class="form-group">
                                                    <label>اسم العائلة:</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="أدخل اللقب"
                                                        value="{{ $item->surname }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div>
                                                <div class="form-group">
                                                    <label>الاسم الأول:</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="أدخل الاسم الأول"
                                                        value="{{ $item->first_name }}" readonly>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="form-group">
                                                    <label>هوية الموظف:</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->empNumber }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div>
                                                <div class="form-group">
                                                    <label>تاريخ البدء (يوم/شهر/سنة):</label>
                                                    <input max="2999-12-31" type="date" class="form-control"
                                                        value="{{ $item->startDate }}" readonly>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="form-group">
                                                    <label>الوصف الوظيفي</label>
                                                    <textarea cols="20" rows="5" class="form-control" readonly>{{ $item->jobdetails }}</textarea>
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
                    <td colspan="8">
                        <div class="am-empty">
                            <i class="fa fa-id-badge"></i>
                            <p>لم تتم إضافة أي موظفين بعد.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Paging is driven over AJAX, so each page is a button the script picks up
     rather than a link that would reload everything. --}}
<div class="am-pagination">
    <div class="am-pagination__info">
        عرض <strong>{{ $userinfo->firstItem() ?? 0 }}–{{ $userinfo->lastItem() ?? 0 }}</strong> من
        <strong>{{ $userinfo->total() }}</strong>
    </div>
    <div class="am-pagination__nav">
        @if ($userinfo->onFirstPage())
            <button type="button" disabled>&lsaquo;</button>
        @else
            <button type="button" data-page="{{ $userinfo->currentPage() - 1 }}" class="am-page-link">&lsaquo;</button>
        @endif
        @php
            $current = $userinfo->currentPage();
            $last    = $userinfo->lastPage();
            $start   = max(1, $current - 2);
            $end     = min($last, $start + 4);
            $start   = max(1, $end - 4);
        @endphp
        @for ($p = $start; $p <= $end; $p++)
            <button type="button" data-page="{{ $p }}" class="am-page-link {{ $p == $current ? 'active' : '' }}">{{ $p }}</button>
        @endfor
        @if ($userinfo->hasMorePages())
            <button type="button" data-page="{{ $userinfo->currentPage() + 1 }}" class="am-page-link">&rsaquo;</button>
        @else
            <button type="button" disabled>&rsaquo;</button>
        @endif
    </div>
</div>
