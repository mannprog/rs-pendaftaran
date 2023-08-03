<!-- Modal -->
<div class="modal fade" id="addData<?php echo e($data->id); ?>" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addLabel">Tambah Tindakan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('add.tindakan', $data->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="data_id" id="data_id" value="<?php echo e($data->id); ?>">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="dokter_id" class="form-label">Nama Dokter<span
                                    class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="dokter_id" id="dokter_id">
                                <option selected disabled>--- Pilih Dokter ---</option>
                                <?php $__currentLoopData = $dokter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="tindakan_id" class="form-label">Tindakan<span
                                    class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="tindakan_id" id="tindakan_id">
                                <option selected disabled>--- Pilih Tindakan ---</option>
                                <?php $__currentLoopData = $tindakan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/admin/pages/pendaftaran/component/addData.blade.php ENDPATH**/ ?>