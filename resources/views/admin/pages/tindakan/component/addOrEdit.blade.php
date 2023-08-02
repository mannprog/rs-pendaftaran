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
                            <label for="nama" class="form-label">Nama Tindakan<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="tarif" class="form-label">Tarif Tindakan<span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="tarif" name="tarif"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="statuses_id" id="statuses_id">
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
                            <label for="edit_nama" class="form-label">Nama Tindakan<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="edit_nama" name="nama"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="edit_tarif" class="form-label">Tarif<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="edit_tarif" name="tarif"
                                required >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label for="edit_statuses_id" class="form-label">Status<span
                                    class="text-danger">*</span></label>
                                    <select class="form-select form-select-sm" name="statuses_id" id="edit_statuses_id">
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
