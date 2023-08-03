

<?php $__env->startSection('content'); ?>
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h3 class="me-3">Detail Pendaftaran</h3>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('pendaftaran.index')); ?>">Kelola Pendaftaran</a></li>
                        <li class="breadcrumb-item" aria-current="page">Detail Pendaftaran</li>
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
                            <img src="<?php echo e(asset('admin/images/user/' . $data->user->foto)); ?>" class="img-fluid">
                        </div>
                        <div class="col-lg-9">
                            <h1 class="border-bottom pb-2"><?php echo e($data->user->name); ?></h1>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    No RKM
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    <?php echo e($data->user->detailpasien->no_rkm); ?>

                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    Tempat, Tanggal Lahir
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    <?php if($data->user->detailpasien->tempat_lahir !== null): ?>
                                        <?php echo e($data->user->detailpasien->tempat_lahir); ?>,
                                        <?php echo e(\Carbon\Carbon::parse($data->user->detailpasien->tanggal_lahir)->format('d M Y')); ?>

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
                                    <?php echo e($data->user->detailpasien->alamat); ?>

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
                                    <?php echo e($data->user->detailpasien->no_hp); ?>

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
                                    <?php echo e($data->user->detailpasien->status->nama); ?>

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

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-primary shadow mb-4" data-bs-toggle="modal"
                        data-bs-target="#addData<?php echo e($data->id); ?>"><i class="ti ti-plus"></i>
                        Tambah Tindakan</button>
                    <?php echo $__env->make('admin.pages.pendaftaran.component.addData', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Tarif</th>
                                    <th scope="col">Tindakan</th>
                                    <th scope="col">Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $ptindakan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->dokter->nama); ?></td>
                                        <td><?php echo e($item->dokter->tarif); ?></td>
                                        <td><?php echo e($item->tindakan->nama); ?></td>
                                        <td><?php echo e($item->tindakan->tarif); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $(document).ready(function() {
            var successMessage = '<?php echo e(session('success')); ?>';

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMessage,
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Detail Pendaftaran'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/admin/pages/pendaftaran/detail.blade.php ENDPATH**/ ?>