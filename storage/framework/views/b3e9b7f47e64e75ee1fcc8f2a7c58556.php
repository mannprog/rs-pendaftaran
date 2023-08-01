<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>RSUHARKEL | <?php echo e($title); ?></title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo e(asset('homepage')); ?>/img/LOGO.png" rel="icon">
    <link href="<?php echo e(asset('homepage')); ?>/img/LOGO.png" rel="apple-touch-icon">
    <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        id="main-font-link" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/fonts/tabler-icons.min.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/css/style-preset.css" id="preset-style-link" />

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Header Topbar ] start -->
    <?php echo $__env->make('admin.layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ Header ] end -->
    <!-- [ Sidebar Menu ] start -->
    <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ Sidebar Menu ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Main Content ] start -->
            <?php echo $__env->yieldContent('content'); ?>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col my-1">
                    <p class="m-0">Copyright &copy; <a href="https://www.facebook.com/salwaa.sn.5"
                            target="_blank">Salwa Siti
                            Nuraisyah</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Required Js -->
    <script src="<?php echo e(asset('admin')); ?>/js/plugins/popper.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/plugins/simplebar.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/config.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/pcoded.js"></script>


    <!-- [Page Specific JS] start -->
    <!-- Apex Chart -->
    <script src="<?php echo e(asset('admin')); ?>/js/plugins/apexcharts.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/pages/dashboard-default.js"></script>
    <!-- [Page Specific JS] end -->

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
<!-- [Body] end -->

</html>
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>