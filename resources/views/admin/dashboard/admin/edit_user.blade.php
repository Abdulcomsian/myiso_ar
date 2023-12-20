@extends('admin.dashboard.layouts.app')

@section('content')
<!-- begin:: Content -->

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="row text-right">
		<div class="col-lg-12">


			<!--begin::Portlet-->
			<div class="kt-portlet">
				<div class="kt-portlet__head kt-portlet__head--lg">
					<div class="kt-portlet__head-label">
						<span class="kt-portlet__head-icon">
							<i class="kt-font-brand flaticon2-line-chart"></i>
						</span>
						<h3 class="kt-portlet__head-title mx-2">
							نماذج المستخدم
						</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<a href="/view_user" class="btn btn-clean btn-icon-sm">
								خلف
								<i class="la la-long-arrow-left"></i>
							</a>
							&nbsp;
							
						</div>
					</div>
				</div>
				
				<!--begin::Form-->
				<div class="kt-portlet__body">

					<!--begin: Datatable -->
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						
						<thead>
					<tr class="odd gradeX">
								<th>الرقم</th>
								<th>النماذج والسجلات</th>
								<th>أجراءات</th>
							</tr>
							<tr class="odd gradeX">
								
								<td>1</td>
								<td>المتطلبات المطلوبة</td>
								<td>
								<a  href="requiremntCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>2</td>
								<td>عمليات تدقيق العمليات</td>

								<td>
									<a  href="ProcessCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
						<tr class="odd gradeX">
								<td>3</td>
								<td>الأطراف المهتمة</td>
								
								<td>
									<a  href="interested_parties/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details: Interested Parties">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
						<tr class="odd gradeX">
								<td>4</td>
								<td>عمليات تدقيق نظام إدارة الجودة</td>
								
								<td>
									<a  href="AuditsCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
							<tr class="odd gradeX">
								<td>5</td>
								<td>عدم المطابقة</td>
								
								<td>
									<a  href="nonConformCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
				<tr class="odd gradeX">
								<td>6</td>
								<td>عملاء</td>
								
								<td>
									<a  href="customerCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
				<tr class="odd gradeX">
								<td>7</td>
								<td>رأي العميل</td>
								
								<td>
									<a  href="customerReviewad/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
				<tr class="odd gradeX">
								<td>8</td>
								<td>الموردين</td>
								
								<td>
									<a href="supplierCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
				<tr class="odd gradeX">
								<td>9</td>
								<td>معايرة</td>
								
								<td>
									<a href="calibrationcheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
							<!--new work for chemical control-->

				<tr class="odd gradeX">
								<td>10</td>
								<td>موظفين</td>
								
								<td>
									<a  href="EmployeCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
				<tr class="odd gradeX">
								<td>11</td>
								<td>مراجعات الإدارة</td>
								
								<td>
									<a href="managementCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
				<tr class="odd gradeX">
								<td>12</td>
								<td>سجلات الصيانة</td>
								
								<td>
									<a href="maintainRecCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>
				<tr class="odd gradeX">
								<td>13</td>
								<td>تقييمات مخاطر الحوادث</td>
								
								<td>
									<a href="AccidentCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>

				<tr class="odd gradeX">
								<td>14</td>
								<td>تقييم المخاطر</td>
								
								<td>
									<a href="riskAssesmntCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>

				    <tr class="odd gradeX">
					<td>15</td>
					<td>التحكم الكيميائي</td>
					
					<td>
						<a href="chemicalcheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
							<i class="fa fa-eye"></i>
						</a>
					</td>
				</tr>
				<tr class="odd gradeX">
								<td>16</td>
								<td>تعليمات العمل</td>
								<td>
									<a  href="workinstructionCheck/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
										<i class="fa fa-eye"></i>
									</a>
								</td>
							</tr>


				
				<tr class="odd gradeX">
					<td>17</td>
					<td>سياسات إضافية</td>
					<td>
						<a  href="additionalpolicies/{{ request()->route('id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md"  title="Customer Details">
							<i class="fa fa-eye"></i>
						</a>
					</td>
				</tr>
								
							
						</thead>
						<tbody>
							
							
						</tbody>
					</table>
					<!--end: Datatable -->
				</div>

				<!--end::Form-->
			</div>

			<!--end::Portlet-->

			
		</div>
	</div>
</div>

<!-- end:: Content -->
@endsection