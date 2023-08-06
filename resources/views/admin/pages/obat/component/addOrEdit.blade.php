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
                        <div class="col-lg-12">
                            <label for="nama" class="form-label">Nama Obat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="stok" class="form-label">Stok<span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="stok" name="stok"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="stok_min" class="form-label">Stok Minimal<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="stok_min" name="stok_min"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="harga_jual" class="form-label">Harga Jual<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="harga_jual" name="harga_jual"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="harga_beli" class="form-label">Harga Beli<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="harga_beli" name="harga_beli"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="exp" class="form-label">Expired<span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm" id="exp" name="exp"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="status_id" class="form-label">Status<span class="text-danger">*</span></label>
                            {{-- <input type="text" class="form-control form-control-sm" id="status_id" name="status_id" --}}
                            {{-- required autofocus> --}}
                            <select class="form-select form-select-sm" name="status_id" id="status_id">
                                <option selected disabled>--- Pilih Status ---</option>
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
                        <div class="col-lg-12">
                            <label for="edit_nama" class="form-label">Nama Obat<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_nama" name="nama"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="edit_stok" class="form-label">Stok<span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="edit_stok" name="stok"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="edit_stok_min" class="form-label">Stok Minimal<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="edit_stok_min"
                                name="stok_min" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="edit_harga_jual" class="form-label">Harga Jual<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="edit_harga_jual"
                                name="harga_jual" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="edit_harga_beli" class="form-label">Harga Beli<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="edit_harga_beli"
                                name="harga_beli" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="edit_exp" class="form-label">Expired<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm" id="edit_exp" name="exp"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="edit_status_id" class="form-label">Status<span
                                    class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="status_id" id="edit_status_id">
                                <option selected disabled>--- Pilih Status ---</option>
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
