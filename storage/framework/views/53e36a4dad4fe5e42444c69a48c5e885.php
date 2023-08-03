<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="b-brand">
                <!-- ========   Change your logo from here   ============ -->
                <img src="<?php echo e(asset('homepage')); ?>/img/LOGO.png" alt="" class="logo logo-lg" style="height: 50px" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <i class="ti ti-dashboard"></i>
                </li>
                <li class="pc-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-dashboard"></i></span><span class="pc-mtext">Dashboard</span></a>
                </li>
                <li class="pc-item pc-caption">
                    <i class="ti ti-news"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-users"></i></span><span
                            class="pc-mtext">Users</span><span class="pc-arrow"><i
                                class="ti ti-chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="<?php echo e(route('users.petugas.index')); ?>">Petugas</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="<?php echo e(route('users.pasien.index')); ?>">Pasien</a></li>
                    </ul>
                </li>
                <li class="pc-item">
                    <a href="<?php echo e(route('layanan.index')); ?>" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-accessible"></i></span><span class="pc-mtext">Layanan</span></a>
                </li>
                <li class="pc-item">
                    <a href="<?php echo e(route('dokter.index')); ?>" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-user"></i></span><span class="pc-mtext">Dokter</span></a>
                </li>
                <li class="pc-item">
                    <a href="<?php echo e(route('tindakan.index')); ?>" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-biohazard"></i></span><span class="pc-mtext">Tindakan</span></a>
                </li>
                <li class="pc-item">
                    <a href="<?php echo e(route('obat.index')); ?>" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-pill"></i></span><span class="pc-mtext">Obat</span></a>
                </li>

                <li class="pc-item pc-caption">
                    <i class="ti ti-apps"></i>
                </li>
                <li class="pc-item">
                    <a href="<?php echo e(route('pendaftaran.index')); ?>" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-receipt"></i></span><span class="pc-mtext">Pendaftaran</span></a>
                </li>

                <li class="pc-item pc-caption">
                    <i class="ti ti-receipt-2"></i>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>