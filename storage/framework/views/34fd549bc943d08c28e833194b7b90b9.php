

<?php $__env->startSection('content'); ?>
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h3 class="me-3">Detail Pasien</h3>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('users.pasien.index')); ?>">Kelola Pasien</a></li>
                        <li class="breadcrumb-item" aria-current="page">Detail Pasien</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-3 mb-3 mb-lg-0 text-center">
                            <img src="<?php echo e(asset('admin/images/user/' . $data->foto)); ?>" class="img-fluid">
                        </div>
                        <div class="col-lg-9">
                            <h1 class="border-bottom pb-2"><?php echo e($data->name); ?></h1>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    Tempat, Tanggal Lahir
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    <?php if($data->detailpasien->tempat_lahir !== null): ?>
                                        <?php echo e($data->detailpasien->tempat_lahir); ?>,
                                        <?php echo e(\Carbon\Carbon::parse($data->detailpasien->tanggal_lahir)->format('d M Y')); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    Alamat
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    <?php echo e($data->detailpasien->alamat); ?>

                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    No Handphone
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    <?php echo e($data->detailpasien->no_hp); ?>

                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    Status
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    <?php if($data->detailpasien->status === 'reguler'): ?>
                                        Reguler
                                    <?php elseif($data->detailpasien->status === 'asuransi'): ?>
                                        Asuransi
                                    <?php else: ?>
                                        BPJS
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Detail Pasien'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/admin/pages/users/pasien/detail.blade.php ENDPATH**/ ?>