<!-- Modal Create -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="itemForm" name="itemForm" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="data_id" id="data_id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="layanan_id" class="form-label">Layanan<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="layanan_id" id="layanan_id">
                                <option selected disabled>--- Pilih Layanan ---</option>
                                <?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="waktu_kunjungan" class="form-label">Waktu Kunjungan<span
                                    class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control form-control-sm" id="waktu_kunjungan"
                                name="waktu_kunjungan" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="status_id" class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" aria-label="Default select example"
                                name="status_id" id="edit_status">
                                <option selected>--- Pilih Status ---</option>
                                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal"
                        onclick="closeModal()">Tutup</button>
                    <button type="button" class="btn btn-primary" id="saveBtn">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Edit -->
<div class="modal fade" id="modal-ed">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" name="editForm" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="data_id" id="edit_data_id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="layanan_id" class="form-label">Layanan<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="layanan_id" id="edit_layanan_id">
                                <option selected disabled>--- Pilih Layanan ---</option>
                                <?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="waktu_kunjungan" class="form-label">Waktu Kunjungan<span
                                    class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control form-control-sm" id="edit_waktu_kunjungan"
                                name="waktu_kunjungan" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="status_id" class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" aria-label="Default select example"
                                name="status_id" id="edit_status_id">
                                <option selected>--- Pilih Status ---</option>
                                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal"
                        onclick="closeModal()">Tutup</button>
                    <button type="button" class="btn btn-primary" id="editBtn">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php $__env->startPush('custom-scripts'); ?>
    <script>
        function closeModal() {
            $('#modal-md').modal('hide');
            $('#modal-ed').modal('hide');
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/pasien/pages/pendaftaran/component/addOrEdit.blade.php ENDPATH**/ ?>