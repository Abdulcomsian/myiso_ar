

<?php $__env->startSection('content'); ?>
<style>section#procedure_section{padding:30px 20px;background:#FFF !important;}</style>
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<!--Begin::Dashboard 1-->
	<!--Begin::Section-->
	<div class="row">
		<div class="col-xl-12 col-lg-12 text-right">
			<h2>فيديوهات التدريب</h2>
		</div>
	</div>
	<section id="procedure_section" class="mt-3">
		
	<div class="container">
	<div class="row">
	
	<?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<!--Video--->
	<div class="col-md-4 mt-2 mb-2" style="    text-align: center;">
	<a href="<?php echo e(url('uploads/explainer_videos/'.$video->video)); ?>" target="_blank">
		<img src="<?php echo e(asset('assets/media/video_images/' . $video->video_image)); ?>" class="img-thumbnail img-fluid"></a>
	
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	</div>
	</div>
	</section>
	<!--End::Section-->
</div>
<?php $__env->stopSection(); ?>
<!-- end:: Content --''
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myiso_ar\resources\views/dashboard/explainer_videos.blade.php ENDPATH**/ ?>