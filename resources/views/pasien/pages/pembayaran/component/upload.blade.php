<!-- Modal -->
<div class="modal fade" id="upload{{ $data->id }}" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addLabel">Upload Bukti Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pasien.upload', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="data_id" id="data_id" value="{{ $data->id }}">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="bukti" name="bukti">
                        <label class="input-group-text" for="bukti">Upload</label>
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
