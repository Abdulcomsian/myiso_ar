

<?php $__env->startSection('content'); ?>
<style>section#procedure_section{padding:30px 20px;background:#FFF !important;}</style>
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<!--Begin::Dashboard 1-->
	<!--Begin::Section-->
	
	<section id="procedure_section" class="mt-3">
		
	<div class="container">
	<div class="row">

		<div class="kt-portlet__body" style="width: 100%">
            <!--begin: Video -->
            <table style="width: 100%" class="table table-striped- table-bordered table-hover table-sm table-checkable table-responsive" id="">

                <thead>

                    <tr>

                        <td  style="text-align:center">رقم س.</td>

                        <td>اسم</td>
                        <td >تنزيل الملف</td>

                        

                       
                    </tr>

                </thead>

                <tbody>
				<?php $count=0;?>
				<?php $__currentLoopData = $all_downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $download): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $count++; 
               
                ?>
                    <tr>
                        
                        <td style="text-align:center; width:20%"><?php echo e($count); ?></td>
                        
                        
                        <td style="width:65%"><?php echo e($download->name); ?></td>
                        
                        
                       
						<td style="width:100%"><a class="btn-fetch-data" href="<?php echo e(asset('uploads/downloads/' . $download->download_file)); ?>" data-id="<?php echo e($download->id); ?>" target="_blank"><?php echo e($download->download_file); ?></a></td>


                    </tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                </tbody>
            </table>
            <!--end: Video -->


        </div>
	
	</div>
	</div>
	
</section>
<!--End::Section-->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	$(document).on('click', '.btn-fetch-data', function(e) {
			e.preventDefault();
			var hrefValue = $(this).attr('href');  // Get the href attribute value
			// Get the data-id from the clicked button
			var dataId = $(this).data('id');
			
			$.ajax({
				url: "<?php echo e(route('user.get-data')); ?>",
				type: 'POST',
				data: {
					id: dataId,
					_token: "<?php echo e(csrf_token()); ?>"
				},
				success: function(response) {
					if (response.status === 'success') {
						// Handle success
						//console.log(response.data);
						//alert("Data fetched successfully!");
						window.open(hrefValue, '_blank');  // Opens the URL in a new tab
						return true;
					} else {
						// Handle error
						console.log(response.message);
						alert("Error: " + response.message);
					}
				},
				error: function(xhr, status, error) {
					console.log(xhr.responseText);
					alert("An error occurred!");
				}
			});
		});
 
</script>
<?php $__env->stopSection(); ?>
<!-- end:: Content --''
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myiso_ar\resources\views/dashboard/download.blade.php ENDPATH**/ ?>