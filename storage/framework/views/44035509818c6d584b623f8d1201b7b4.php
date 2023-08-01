<header class="pc-header">
    <div class="m-header">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="b-brand mx-auto">
            <!-- ========   change your logo hear   ============ -->
            <img src="<?php echo e(asset('homepage')); ?>/img/LOGO.png" class="logo logo-lg" style="height: 50px" />
        </a>
        <!-- ======= Menu collapse Icon ===== -->
        <div class="pc-h-item">
            <a href="#" class="pc-head-link head-link-secondary m-0" id="sidebar-hide">
                <i class="ti ti-menu-2"></i>
            </a>
        </div>
    </div>
    <div class="header-wrapper">
        <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <li class="pc-h-item header-mobile-collapse">
                    <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">
                
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo e(asset('admin')); ?>/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
                        <span>
                            <i class="ti ti-settings"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header">
                            <p class="text-muted fw-bold"><?php echo e(auth()->user()->name); ?>, <span
                                    class="small text-muted fw-normal">
                                    <?php echo e(auth()->user()->jabatan); ?></span></p>
                            <hr />
                            <div class="profile-notification-scroll position-relative"
                                style="max-height: calc(100vh - 280px)">
                                
                                <form action="<?php echo e(route('logout')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button class="dropdown-item"><i class="ti ti-logout"></i> Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/admin/layouts/topbar.blade.php ENDPATH**/ ?>