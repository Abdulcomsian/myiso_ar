
<?php $__env->startSection('content'); ?>
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Edit FAQ
                </h3>
            </div>

        </div>
	<?php if($message = Session::get('msg')): ?>
		<div class="row">
            <div class="col-md-11 pl-4 ml-4 mt-4">
	<div class="alert alert-success alert-dismissible"><?php echo e($message); ?> &nbsp; 
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	</div>
	</div>
	</div>
	<?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div id="new_faq" class="p-4">
                    <h3>Update FAQ</h3>
										
                    <form action="<?php echo e(url('/faq_update/'.$faq->id)); ?>" method="POST">
                                 <?php echo csrf_field(); ?> 
								 <input type="hidden" name="id" value="<?php echo e($faq->id); ?>">
								 <div class="form-group">
									<label for="question">Question:</label>
									<input type="text" id="question" name="question" class="form-control" placeholder="Question:" required="required" value="<?php echo e($faq->question); ?>"/>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="answer">Answer</label>
											<textarea required name="answer" id="answer" class="form-control"><?php echo e($faq->answer); ?></textarea>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label for="category">Category:</label>
											<select required name="category" id="category" class="form-control">
                                                <option disabled="disabled" value="">Select Category</option>
<?php $__currentLoopData = $all_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                           
		<option value="<?php echo e($cate->id); ?>" <?php echo e($faq->category == $cate->id ? ' selected ':''); ?>><?php echo e($cate->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                           
                                            </select>
										</div>
									</div>
								</div>
								
								<button type="submit" class="submitBtn">SUBMIT</button>
								<!---- <a href="https://myisoonline.com/requirements_aspect" style="float: right;margin-right: 6px;border: none;background: #646c9a;color: #fff;padding: 8px 47px;border-radius: 5px;"> Cancel </a>---->
                    		</form>
                    
<div class="clearfix mb-4">&nbsp;</div>

                </div>
            </div>
 
        </div>

        
    </div>
</div>
<script src="<?php echo e(asset('assets/vendors/ckeditor/ckeditor.js')); ?>"></script>
<script>
CKEDITOR.replace( 'answer' );
</script>
<!---- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>   
    $.noConflict();
jQuery(document).ready(function($){
    console.log('test.....');
$('.close').on('click',function(){
		$(this).closest('.collapse').hide();
});

});
</script>--->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\myiso_arabic\resources\views/admin/dashboard/admin/faq_edit.blade.php ENDPATH**/ ?>