@extends('dashboard.layouts.app')

@section('content')
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

	<!--Begin::Dashboard 1-->


	<!--Begin::Section-->
	<div class="row">
		<div class="col-xl-12 col-lg-12">
			<h2>Sales Process</h2>
		</div>
	</div>
	<section id="procedure_section">
		
		<div class="row">
			<div class="col-lg-12">
				<div class="procedure_div">
					<img src="../../../public/assets/media/policy/Management-Organogram.png">
					<p class="m-t-20">This process is to be used to begin a contract from customer.</p>
					<p>Input: Request to quote</p>
					<p>Output: Reception and implementation of a purchase order</p>
					<p>Process owner is: Oliver Bocking</p>
				</div>
			</div>
		</div>
	</section>

	<!--End::Section-->
</div>
@endsection
<!-- end:: Content -->