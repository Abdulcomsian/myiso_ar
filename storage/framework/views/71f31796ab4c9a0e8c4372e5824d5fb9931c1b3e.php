<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title><?php echo e(Auth::user()->company_name); ?></title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!--begin::Fonts -->

    <link href="../assets/vendors/custom/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&display=swap" rel="stylesheet">
    <!--end::Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="<?php echo e(asset('/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')); ?>" rel="stylesheet"
        type="text/css" />

    <!--end::Page Vendors Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="<?php echo e(asset('/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')); ?>" rel="stylesheet"
        type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="<?php echo e(asset('/assets/vendors/general/tether/dist/css/tether.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/select2/dist/css/select2.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/nouislider/distribute/nouislider.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/dropzone/dist/dropzone.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/summernote/dist/summernote.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/animate.css/animate.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/toastr/build/toastr.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/morris.js/morris.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/sweetalert2/dist/sweetalert2.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/general/socicon/css/socicon.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/custom/vendors/flaticon/flaticon.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/custom/vendors/flaticon2/flaticon.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('/assets/vendors/custom/vendors/fontawesome5/css/all.min.css')); ?>" rel="stylesheet"
        type="text/css" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="<?php echo e(asset('/assets/demo/default/base/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="<?php echo e(asset('/assets/demo/default/skins/header/base/light.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/demo/default/skins/header/menu/light.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/demo/default/skins/brand/dark.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/assets/demo/default/skins/aside/dark.css')); ?>" rel="stylesheet" type="text/css" />


    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="<?php echo e(asset('/assets/media/logos/fav.png')); ?>" />

    <?php if(Request::is('products*') || Request::is('user*')): ?>
        <!--begin::Page Vendors Styles(used by this page) -->
        <link href="<?php echo e(asset('/assets/vendors/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet"
            type="text/css" />
        <!--end::Page Vendors Styles -->
    <?php endif; ?>
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet" type="text/css" />
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<style>
    .iti {
        display: block !important;

    }

    .custom-file-input-tag {
  position: relative;
  display: inline-block;

}

.input-file {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
}

.file-label {
    display: inline-block;
    padding: 4px 11px;
    background-color: #E5E5E5;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
    margin-bottom: 0px;
    border: 1px solid #2547B3;
}

.file-text {
  display: inline-block;
  margin-right: 8px;
}

.file-chosen {
  display: none;
}
</style>
<!-- end::Head -->
<?php /**PATH C:\xampp\htdocs\myiso_ar\resources\views/dashboard/includes/head.blade.php ENDPATH**/ ?>