

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
            <table style="width:100%" class="table table-striped- table-bordered table-hover table-sm table-checkable table-responsive" id="kt_table_user">

                <thead>

                    <tr>

                        <th style="text-align:center">رقم س.</th>

                        <th>اسم</th>
                        <th>الملف الذي تم تنزيله</th>
						<th>تاريخ</th>

                        

                      

                    </tr>

                </thead>

                <tbody>
				<?php $count=0;?>
				<?php $__currentLoopData = $view_downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userdownload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $count++; 
                
                ?>
                    <tr>
                        
                        <td style="text-align:center; width:100px;"><?php echo e($count); ?></td>
                        
                        
                        <td style="width:200px"><?php echo e($userdownload->downloads->name ?? ''); ?></td>
                        
                        
                        <td style="width:200px"><?php echo e($userdownload->downloads->download_file ?? ''); ?></td>
                    
                        
                        <td style="width:200px"><?php echo e($userdownload->dated ?? ''); ?></td>
                       
                        

                        

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
<?php $__env->stopSection(); ?>
<!-- end:: Content --''
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\myiso_ar\resources\views/dashboard/view-userdownload.blade.php ENDPATH**/ ?>