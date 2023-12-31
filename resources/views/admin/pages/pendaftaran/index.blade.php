@extends('admin.layouts.app', ['title' => 'Kelola Pendaftaran'])

@section('content')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h3 class="me-3">Kelola Pendaftaran</h3>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Kelola Pendaftaran</li>
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
                    <button id="createData" class="btn btn-sm btn-primary shadow mb-4"><i class="ti ti-plus"></i>
                        Tambah</button>
                    <a href="{{ route('pendaftaran.export') }}" class="btn btn-sm btn-info shadow mb-4" target="_blank"><i
                            class="ti ti-download"></i>
                        Laporan</a>
                    <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table align-items-center display responsive nowrap', 'width' => '100%']) }}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->

    @include('admin.pages.pendaftaran.component.addOrEdit')
@endsection

@push('custom-styles')
    <link rel="stylesheet" href="{{ asset('admin/cdn/http_cdn.datatables.net_1.13.4_css_dataTables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/cdn/http_cdn.datatables.net_responsive_2.4.1_css_responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/cdn/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.css') }}">
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/cdn/http_cdn.datatables.net_1.13.4_js_jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/cdn/http_cdn.datatables.net_1.13.4_js_dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin/cdn/http_cdn.datatables.net_responsive_2.4.1_js_dataTables.responsive.js') }}"></script>
    <script src="{{ asset('admin/cdn/http_cdn.datatables.net_responsive_2.4.1_js_responsive.bootstrap4.js') }}"></script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            var successMessage = '{{ session('success') }}';

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMessage,
                });
            }

            $('#createData').click(function() {
                setTimeout(function() {
                    $('#nama').focus();
                }, 500);
                $('#saveBtn').removeAttr('disabled');
                $('#saveBtn').html("Simpan");
                $('#itemForm').trigger("reset");
                $('.modal-title').html("Tambah Pendaftaran");
                $('#modal-md').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $('#saveBtn').attr('disabled', 'disabled');
                $('#saveBtn').html('Simpan ...');
                var formData = new FormData($('#itemForm')[0]);
                $.ajax({
                    data: formData,
                    url: "{{ route('pendaftaran.store') }}",
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#itemForm').trigger("reset");
                        $('#modal-md').modal('hide');
                        $('#pendaftaran-table').DataTable().draw();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                    },
                    error: function(data) {
                        $('#saveBtn').removeAttr('disabled');
                        $('#saveBtn').html("Simpan");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oppss',
                            text: data.responseJSON.message,
                        });
                        $.each(data.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                        });
                    }
                });
            });

            $('body').on('click', '#editData', function() {
                var data_id = $(this).data('id');
                $.get("{{ route('pendaftaran.index') }}" + '/' + data_id + '/edit', function(data) {
                    $('#modal-ed').modal('show');
                    setTimeout(function() {
                        $('#nama').focus();
                    }, 500);
                    $('.modal-title').html("Edit Pendaftaran");
                    $('#editBtn').removeAttr('disabled');
                    $('#editBtn').html("Simpan");
                    $('#edit_data_id').val(data.id);
                    $('#edit_user_id').val(data.user_id);
                    $('#edit_layanan_id').val(data.layanan_id);
                    $('#edit_waktu_kunjungan').val(data.waktu_kunjungan);
                    $('#edit_status_id').val(data.status_id);
                })
            });

            $('#editBtn').click(function(e) {
                e.preventDefault();
                var data_id = $(this).data('id');
                var formData = new FormData($('#editForm')[0]);
                $('#editBtn').attr('disabled', 'disabled');
                $('#editBtn').html('Simpan ...');
                $.ajax({
                    data: formData,
                    url: "{{ route('pendaftaran.index') }}" + '/' + data_id,
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data) {
                        $('#editForm').trigger("reset");
                        $('#modal-ed').modal('hide');
                        $('#pendaftaran-table').DataTable().draw();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                    },
                    error: function(data) {
                        $('#editBtn').removeAttr('disabled');
                        $('#editBtn').html("Simpan");
                        Swal.fire({
                            icon: 'error',
                            title: 'Oppss',
                            text: data.responseJSON.message,
                        });
                        $.each(data.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                        });
                    }
                });
            });

            $('body').on('click', '.deleteBtn', function(e) {
                e.preventDefault();
                var confirmation = confirm("Apakah yakin untuk menghapus?");
                if (confirmation) {
                    var data_id = $(this).data('id');
                    var formData = new FormData($('#deleteDoc')[0]);
                    $('.deleteBtn').attr('disabled', 'disabled');
                    $('.deleteBtn').html('...');
                    $.ajax({
                        data: formData,
                        url: "{{ route('pendaftaran.index') }}" + '/' + data_id,
                        contentType: false,
                        processData: false,
                        type: "POST",
                        success: function(data) {
                            $('#deleteDoc').trigger("reset");
                            $('#pendaftaran-table').DataTable().draw();
                            toastr.success(data.message);
                        },
                        error: function(data) {
                            $('.deleteBtn').removeAttr('disabled');
                            $('.deleteBtn').html('Hapus');
                            // toastr.error(data.responseJSON.message)
                            toastr.error('Tidak bisa hapus data karena sudah digunakan')
                        }
                    });
                }
            });
        });
    </script>
@endpush
