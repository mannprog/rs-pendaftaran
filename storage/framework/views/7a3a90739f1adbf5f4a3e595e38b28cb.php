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
                            <label for="name" class="form-label">Nama Lengkap<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="username" name="username"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email"
                                required>
                        </div>
                        <div class="col-lg-6">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-sm" id="password" name="password"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                            <img id="img-preview" class="col-lg-6 img-fluid mt-2">
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
                            <label for="edit_name" class="form-label">Nama Lengkap<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_name" name="name"
                                required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_username" class="form-label">Username<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_username"
                                name="username" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" id="edit_email"
                                name="email" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_tempat_lahir"
                                name="tempat_lahir" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm" id="edit_tanggal_lahir"
                                name="tanggal_lahir" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" aria-label="Default select example" name="status" id="edit_status">
                                <option selected>--- Pilih Status ---</option>
                                <option value="reguler">Reguler</option>
                                <option value="asuransi">Asuransi</option>
                                <option value="bpjs">BPJS</option>
                              </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="no_hp" class="form-label">No Handphone<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_no_hp"
                                name="no_hp" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_foto" class="form-label">Foto</label>
                            <input class="form-control form-control-sm" type="file" id="edit_foto" name="foto">
                            <img id="edit_img-preview" class="col-lg-6 img-fluid mt-2">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-lg-6">
                            <label for="alamat" class="form-label">Alamat<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="edit_alamat" name="alamat" required rows="3"></textarea>
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

        $('#foto').change(function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = $('#img-preview');
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
        $('#edit_foto').change(function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = $('#edit_img-preview');
                previewImage.attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/admin/pages/users/pasien/component/addOrEdit.blade.php ENDPATH**/ ?>