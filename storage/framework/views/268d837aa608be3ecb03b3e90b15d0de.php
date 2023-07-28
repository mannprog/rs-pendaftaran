<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>RSUHARKEL | Login</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Berry is made using Bootstrap 5 design framework. Download the free admin template & use it for your project." />
    <meta name="keywords"
        content="Berry, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template" />
    <meta name="author" content="CodedThemes" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="<?php echo e(asset('admin')); ?>/images/favicon.svg" type="image/x-icon" />
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

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <a href="<?php echo e(route('homepage')); ?>" class="d-flex justify-content-center">
                            <img src="<?php echo e(asset('homepage')); ?>/img/LOGO.PNG" style="height: 100px" />
                        </a>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <div class="auth-header">
                                    <h2 class="text-primary mt-5"><b>Selamat Datang...</b></h2>
                                    <p class="f-16 mt-2">Isi form dibawah untuk melanjutkan</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput"
                                placeholder="Email address / Username" />
                            <label for="floatingInput">Email address / Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Password" />
                            <label for="floatingInput">Password</label>
                        </div>
                        <div class="d-flex mt-1 justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                    checked="" />
                                <label class="form-check-label text-muted" for="customCheckc1">Remember me</label>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="button" class="btn btn-primary">Sign In</button>
                        </div>
                        <hr />
                        <h5 class="d-flex justify-content-center">Belum punya akun?<a href="<?php echo e(route('registrasi')); ?>"
                                class="ms-1">Daftar disini...</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="<?php echo e(asset('admin')); ?>/js/plugins/popper.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/plugins/simplebar.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/config.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/pcoded.js"></script>

</body>
<!-- [Body] end -->

</html>
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/auth/login.blade.php ENDPATH**/ ?>