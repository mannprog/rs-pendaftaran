<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">RSU HARKEL</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="<?php echo e(asset('homepage')); ?>/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto <?php echo e(Route::is('homepage') ? 'active' : ''); ?>"
                        href="<?php echo e(route('homepage')); ?>">Home</a>
                </li>
                <li><a class="nav-link scrollto <?php echo e(Route::is('homepage.profil') ? 'active' : ''); ?>"
                        href="<?php echo e(route('homepage.profil')); ?>">Profil</a></li>
                <li class="dropdown"><a href="#"
                        class="<?php echo e(Route::is('pelayanan*') ? 'active' : ''); ?>"><span>Fasilitas dan
                            Layanan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="<?php echo e(route('pelayanan.poli.kandung')); ?>">Poli Kandung</a></li>
                        <li><a href="<?php echo e(route('pelayanan.poli.anak')); ?>">Poli Anak</a></li>
                        <li><a href="<?php echo e(route('pelayanan.poli.penyakitdalam')); ?>">Poli Penyakit Dalam</a></li>
                        <li><a href="<?php echo e(route('pelayanan.poli.saraf')); ?>">Poli Saraf</a></li>
                        <li><a href="<?php echo e(route('pelayanan.poli.bedah')); ?>">Poli Bedah</a></li>
                        <li><a href="<?php echo e(route('pelayanan.poli.tht')); ?>">Poli THT</a></li>
                        <li><a href="<?php echo e(route('pelayanan.poli.laboratorium')); ?>">Poli Laboratorium</a></li>
                        <li><a href="<?php echo e(route('pelayanan.poli.radiologi')); ?>">Poli Radiologi</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Pendaftaran</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="<?php echo e(route('registrasi')); ?>">Registrasi</a></li>
                        <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                    </ul>
                </li>
                <?php if(Route::currentRouteName() === 'homepage'): ?>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <?php else: ?>
                    <li><a class="nav-link scrollto" href="<?php echo e(route('homepage')); ?>#contact">Contact</a></li>
                <?php endif; ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/homepage/layouts/navbar.blade.php ENDPATH**/ ?>