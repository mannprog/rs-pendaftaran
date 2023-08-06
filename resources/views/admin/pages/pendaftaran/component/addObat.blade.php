<!-- Modal -->
<div class="modal fade" id="addObat{{ $data->id }}" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addLabel">Tambah Obat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('add.obat', $data->id) }}" method="POST">
                @csrf
                <input type="hidden" name="data_id" id="data_id" value="{{ $data->id }}">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="obat_id" class="form-label">Nama Obat<span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="obat_id" id="obat_id">
                                <option selected disabled>--- Pilih Obat ---</option>
                                @foreach ($obats as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }} / {{ $item->stok }} /
                                        {{ $item->status->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="qty" class="form-label">Kuantiti<span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" id="qty" name="qty"
                                required>
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
