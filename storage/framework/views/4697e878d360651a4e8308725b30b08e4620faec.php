
<style>
	.select2-container{
		width: 766px !important;
	}
	<style>
	 .select2-search__field{
		 padding-left: 10px !important;
	 }
	.multiselect-native-select .btn-group{
		width: 100%;
	}
	/* .multiselect-native-select .btn-group button{
        text-a
    } */
	.ms-options ul{
		padding: 8px;
		list-style-type: none;
	}
	.ms-options ul label{
		text-align: left !important;
		line-height: 12px;
	}
	.ms-options-wrap button{
		border: 1px solid #0d47b3;
	}
</style>

<?php $__env->startSection('content'); ?>

<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<?php if($message = Session::get('success')): ?>
	<div class="alert alert-light alert-elevate" role="alert">
		<!-- <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div> -->
		<!-- <div class="alert-text">
			DataTables has the ability to read data from virtually any JSON data source that can be obtained by Ajax. This can be done, in its most simple form, by setting the ajax option to the address of the JSON data source.
			See official documentation <a class="kt-link kt-font-bold" href="https://datatables.net/examples/data_sources/ajax.html" target="_blank">here</a>.
		</div> -->

	        <!-- <div class="alert alert-success"> -->
	            <p><?php echo e($message); ?></p>
	        <!-- </div> -->
	</div>
	<?php endif; ?>
	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="kt-font-brand flaticon2-line-chart"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					Sent Messages
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
						<div class="dropdown dropdown-inline">
							
						</div>
						&nbsp;
						<button data-toggle="modal" data-target="#MessageModal"  class="btn btn-brand btn-elevate btn-icon-sm" >
							<i class="la la-plus"></i>
							New Message
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body">

			<!--begin: Datatable -->
			<table class="table table-striped- table-bordered table-hover table-checkable table-responsive" id="kt_table_user">
				<thead>
					<tr>
						<th>No.</th>
						<th>To</th>
						<th>Company Name</th>
						<th>Email Address</th>
						<th>Message</th>
						<th>Sent at</th>
						
					</tr>
				</thead>
				<tbody>

					<?php $count=0;?>
					<?php $__currentLoopData = $adminmessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($item->admin_delete ==0): ?>
						<?php $count++; ?>
						<tr>
							<td><?php echo e($count); ?></td>
							<?php
							 $username=\App\User::where('id',$item->send_to)->first();
							?>
							<td><?php echo e($username->name); ?></td>

							<td><?php echo e($item->company_name); ?></td>
							<td><?php echo e($item->email); ?></td>
							<td>
							<a href="#" data-toggle="modal" data-target="#view-notification-<?php echo e($item->id); ?>"> View Message </a>

                                <div class="modal fade" id="view-notification-<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                											<div class="modal-dialog" role="document">
                                												<div class="modal-content">
                                													<div class="modal-header">
                                														<h5 class="modal-title" id="exampleModalLabel">Message to <?php echo e($item->name); ?></h5>
                                														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                														</button>
                                													</div>
                                													<div class="modal-body">
                                														<h5><?php echo e($item->title); ?></h5>
                                														<p>&nbsp;</p>
                                														<p><?php echo e($item->message); ?></p>
                                													</div>
                                													<div class="modal-footer">
                                													<?php if($item->attachement != NULL || $item->attachement): ?>
                                													<a target="_blank" href="public/<?php echo e($item->attachement); ?>">View Attachment</a>
                                													<?php endif; ?>
                                											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                                													</div>
                                												</div>
                                											</div>
                                										</div>

							</td>
							<td><?php echo e(date("d/m/Y H:i:sA", strtotime($item->notification_created_at) )); ?></td>

							
							
							
						</tr>


					<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</tbody>
			</table>
			<!--end: Datatable -->
		</div>
	</div>
</div>


<div class="modal fade" id="MessageModal" tabindex="-1" role="dialog" aria-labelledby="MessageModal" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="MessageModal">Send Message</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<form class="kt-form kt-form--label-right"  action="<?php echo e(route('sendNotifications')); ?>" enctype="multipart/form-data" method="POST">
				<?php echo csrf_field(); ?>
			<div class="modal-body">

					<div class="kt-portlet__body">
						<input type="hidden" name="id" id="editvalue" value="">
						<div class="form-group row">
							<div class="col-lg-8">
								<label for="title">Subject:</label>
								<input type="text" id="title" name="title" class="form-control" placeholder="Please enter Message Subject">
							</div>
                            <div class="col-md-4">
								<label for="attachment">Attachment</label>
								<div class="kt-input-icon kt-input-icon--right">
								<input type="file" name="attachment" class="form-control" id="attachment">
								</div>
							</div>



							<div class="col-lg-12">
								<label for="message">Message:</label>
								<textarea name="message" id="message" cols="20" rows="5" class="form-control" placeholder="Please enter your Message"></textarea>
							</div>


							<div class="col-lg-12">
								<label for="address1">Send to:</label>
								<div class="kt-input-icon kt-input-icon--right">
									<select name="userid[]" id="langOpt3" class="form-control" multiple>
										<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?> </option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="col-lg-2">

								<div class="kt-input-icon kt-input-icon--right">

								</div>
							</div>

						</div>

					</div>



			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-brand btn-elevate btn-icon-sm"><i class="fa fa-paper-plane"></i>  Send </button>
			</div>

		</form>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('myscript'); ?>
	<script type="text/javascript" src="<?php echo e(asset('assets/jquery.multiselect.js')); ?>"></script>
	<script src="http://demos.codexworld.com/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.js"></script>
	<script>
		$('#langOpt3').multiselect({
			columns: 1,
			placeholder: 'Select Languages',
			search: true,
			selectAll: true
		});

	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myiso_arabic\resources\views/admin/dashboard/admin/send_notifications.blade.php ENDPATH**/ ?>