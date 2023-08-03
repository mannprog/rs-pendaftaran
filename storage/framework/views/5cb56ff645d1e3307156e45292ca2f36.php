

<?php $__env->startSection('content'); ?>
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h3 class="me-3">Dashboard</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <!-- Apex Chart -->
    <script src="<?php echo e(asset('admin/js/plugins/apexcharts.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>