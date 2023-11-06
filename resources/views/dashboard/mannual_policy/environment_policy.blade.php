@extends('dashboard.layouts.app')

@section('content')
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

	<!--Begin::Dashboard 1-->


	<!--Begin::Section-->
	<div class="row">
		<div class="col-xl-12 col-lg-12">
			<h2>Environmental Policy</h2>
		</div>
	</div>
	<section id="procedure_section">
		<?php
			$companyName=Auth::user()->company_name;
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="procedure_div">
					<div class="row">
						<div class="col-lg-12 text-right">
							<a onclick="qualityshowpolicy()" class="addBtn">Add Environmental Policy</a>
						</div>
					</div>

					<div class="quality_add_div">
						<form action="{{ route('environment_policy') }}" id="addcust" method="post">
							@csrf
							<h3>Add Environmental Policy</h3>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label>Enter additional Environmental Policies that are specific to your working Environment and Business activities</label><br>
										<textarea name="message" class="form-control" placeholder="Set a maximum for the number of character that can be entered to 450.">{{ $previousPolicy ? $previousPolicy->message : '' }}</textarea>
									</div>
								</div>
							</div>

							<input type="hidden" name="status" value="2" />
							<button type="submit" class="submitBtn">SUBMIT</button>
							<button type="reset" onclick="qualityshowpolicy()" class="btn btn-secondary submitBtn" style="margin-right:7px;">Cancel</button>
						</form>
					</div>
				</div>

				<div class="procedure_div">
				    <p>Each country has its own regulations and laws relating to Environmental Legislation within the workplace. These must be complied with by both the employer and the company employees. It is the obligation of the company to ensure that they are aware and understand their responsibilities and regularly check for updates and changes.</p>
				    <p>{{ $companyName}} will develop and maintain procedures to identify and support the reduction of negative environmental impacts, determine controls and then implement them. These controls will be reviewed and monitored on a regular basis. The company will take all reasonable steps to reduce environmental impacts within the workplace and to provide guidance on the measures that should be applied within the hierarchy of control. </p>
					<p><b><span class="authName">{{ $companyName}}</span></b> is committed to continually monitoring and improving the environmental performance of the company. It will regularly measure its impact on the environment and set targets to ensure ongoing improvement.</p>
					<p>It is the policy of <b><span class="authName">{{ $companyName}}</span></b> to:</p>
					<ol>
						<li>Strive to prevent pollution in its processes and at its facilities.</li>
						<li>Comply with all current legislation regarding environmental issues.</li>
						<li>Encourage its suppliers to adopt similar principles where possible.</li>
						<li>Set, monitor and review environmental performance, targets and objectives.</li>
						<li>Ensure its staff understand the importance of protecting the environment and enlist their support to raise awareness and strive to improve the company’s performance.</li>
						<li>To continually improve the environmental performance of the company.</li>
						<li>Actively promote recycling within the company and, where possible, its suppliers.</li>
						<li>Seek to minimise harmful emissions of its fleet and power usage.</li>
						<li>Minimise waste by regular evaluation of operations and efficiency.</li>
						<li>Source a product range or supply services that will minimise the environmental impact of the company’s distribution and production.</li>
				
						<h5 class="mt-6" style="position: relative; left: -35px; margin-top: 15px">Additional Policies:</h5>
					
						 <!-- Display the previous policy -->
						 @php
							
							// $message = explode(PHP_EOL, $previousPolicy->message);
							if($previousPolicy!=null){
							$lines = explode("\r\n", $previousPolicy->message); // or use PHP PHP_EOL constant
							// dd($lines);
							if ( !empty($lines) ) 
							{
								foreach ( $lines as $line ) 
								{
									if($line == NULL){continue;}else
									{
									echo '<li>'. trim( $line ) .'</li>';
								}
								}
							}
							}
						 @endphp		
						{{-- 
							@if ($previousPolicy)
							<li>{{ $previousPolicy->message }}</li>
							@endif  
							@foreach ($useraddpolicy as $environmental)
                           <li>{{$environmental->message}}</li>
                           @endforeach --}}
					</ol>
					<p>On behalf of <b><span class="authName">{{ $companyName}}</span></b>:</p>
					<p>Name: <span class="authName">{{Auth::user()->director}}</span> </p>
					<p>Date: {{date("d-F-Y")}}</p>
				</div>
			</div>
		</div>
	</section>

	<!--End::Section-->
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">	
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Deleting Requirements Due</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<p>Are you sure?Do you really want to delete this?.</p>
			</div>
			<div class="modal-footer">
				<form action="" method="POST">
				@csrf
				@method('DELETE')
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="submit" class="btn btn-danger">Yes</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
<!-- end:: Content -->