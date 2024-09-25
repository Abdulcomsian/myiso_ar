
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
                    التنزيلات
                </h3>
            </div>
            
        </div>
	<?php if($message = Session::get('msg')): ?>
		<div class="row">
            <div class="col-md-11 pl-4 ml-4 mt-4">
	<div class="alert alert-success alert-dismissible"><?php echo e($message); ?> &nbsp; <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
	</div>
	</div>
	<?php endif; ?>
        

        <div class="kt-portlet__body">
            <!--begin: Video -->
                <!--begin: Video -->
                <table style="width:100%" class="table table-striped- table-bordered table-hover table-sm table-checkable table-responsive" id="kt_table_user">
    
                    <thead>
    
                        <tr>
    
                            <th style="text-align:center;">رقم س.</th>
                            <th >مستخدم</th>
                        </tr>
    
                    </thead>
    
                    <tbody>
                    <?php $count=1;?>
                    
                    
                    <?php $i=1;?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($user->userDownload) && count($user->userDownload) > 0): ?>
                    <tr>
                        <td style="width:5%"><?php echo e($i); ?></td>
                        <td style="vertical-align: middle; width:20%"><a href="edit_user/<?php echo e($user->id ?? ''); ?>" target="_blank"><?php echo e($user->name); ?></a></td>
                        <td style="width:100%">
                            <table style="width:100%">
                                <thead>
                                    <th style="width:40%; ">اسم</th>
                                    <th style="width:40%;">الملف الذي تم تنزيله</th>
                                    <th style="width:40%;">تاريخ</th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $user->userDownload; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $download): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="width:40%;"><?php echo e($download->downloads->name ?? ''); ?></td>
                                        <td style="width:40%;"><?php echo e($download->downloads->download_file ?? ''); ?></td>
                                        <td style="width:40%;"><?php echo e($download->dated ?? ''); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <?php $i ++;?>
                    <?php endif; ?>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!--end: Video -->
    
    
            <!--end: Video -->


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myiso_ar\resources\views/admin/dashboard/admin/view_users_downloads.blade.php ENDPATH**/ ?>