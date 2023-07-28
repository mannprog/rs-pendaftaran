<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RSUHARKEL</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo e(asset('homepage')); ?>/img/LOGO.png" rel="icon">
    <link href="<?php echo e(asset('homepage')); ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('homepage')); ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset('homepage')); ?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <?php echo $__env->make('homepage.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(Route::currentRouteName() === 'homepage'): ?>
        <?php echo $__env->make('homepage.layouts.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <main id="main">

        <?php echo $__env->yieldContent('main'); ?>

    </main><!-- End #main -->

    <?php echo $__env->make('homepage.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('homepage')); ?>/vendor/aos/aos.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo e(asset('homepage')); ?>/js/main.js"></script>

</body>

</html>
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/homepage/layouts/app.blade.php ENDPATH**/ ?>