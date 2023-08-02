<form id="deleteDoc" method="post">
    @csrf
    @method('DELETE')
    {{-- <a href="{{ route('users.petugas.show', $row->id) }}" class="btn btn-sm mb-0 btn-info"><i class="ti ti-eye"></i></a> --}}
    <a href="javascript:void()" data-id="{{ $row->id }}" id="editData" class="btn btn-sm mb-0 btn-warning"><i
            class="ti ti-edit"></i></a>
    <button type="submit" class="btn btn-sm mb-0 btn-danger deleteBtn text-light" data-id="{{ $row->id }}"><i
            class="ti ti-trash"></i></button>
</form>
