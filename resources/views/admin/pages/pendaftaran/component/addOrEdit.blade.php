<!-- Modal Create -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="itemForm" name="itemForm" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="data_id" id="data_id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="user_id" class="form-label">Nama Pasien<span
                                    class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="user_id" id="user_id">
                                <option selected disabled>--- Pilih Pasien ---</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="layanan_id" class="form-label">Layanan<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="layanan_id" id="layanan_id">
                                <option selected disabled>--- Pilih Layanan ---</option>
                                @foreach ($layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="waktu_kunjungan" class="form-label">Waktu Kunjungan<span
                                    class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control form-control-sm" id="waktu_kunjungan"
                                name="waktu_kunjungan" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="status_id" class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" aria-label="Default select example"
                                name="status_id" id="edit_status">
                                <option selected>--- Pilih Status ---</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
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
                @csrf
                @method('PUT')
                <input type="hidden" name="data_id" id="edit_data_id">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="user_id" class="form-label">Nama Pasien<span
                                    class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="user_id" id="edit_user_id">
                                <option selected disabled>--- Pilih Pasien ---</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="layanan_id" class="form-label">Layanan<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="layanan_id" id="edit_layanan_id">
                                <option selected disabled>--- Pilih Layanan ---</option>
                                @foreach ($layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="waktu_kunjungan" class="form-label">Waktu Kunjungan<span
                                    class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control form-control-sm"
                                id="edit_waktu_kunjungan" name="waktu_kunjungan" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="status_id" class="form-label">Status<span
                                    class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" aria-label="Default select example"
                                name="status_id" id="edit_status_id">
                                <option selected>--- Pilih Status ---</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
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

@push('custom-scripts')
    <script>
        function closeModal() {
            $('#modal-md').modal('hide');
            $('#modal-ed').modal('hide');
        }
    </script>
@endpush
