@extends('admin.layouts.app', ['title' => 'Detail Pendaftaran'])

@section('content')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h3 class="me-3">Detail Pendaftaran</h3>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pendaftaran.index') }}">Kelola Pendaftaran</a></li>
                        <li class="breadcrumb-item" aria-current="page">Detail Pendaftaran</li>
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
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-3 mb-3 mb-lg-0 text-center">
                            <img src="{{ asset('admin/images/user/' . $data->user->foto) }}" class="img-fluid">
                        </div>
                        <div class="col-lg-9">
                            <h1 class="border-bottom pb-2">{{ $data->user->name }}</h1>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    No RKM
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    {{ $data->user->detailpasien->no_rkm }}
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    Tempat, Tanggal Lahir
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    @if ($data->user->detailpasien->tempat_lahir !== null)
                                        {{ $data->user->detailpasien->tempat_lahir }},
                                        {{ \Carbon\Carbon::parse($data->user->detailpasien->tanggal_lahir)->format('d M Y') }}
                                    @endif
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    Alamat
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    {{ $data->user->detailpasien->alamat }}
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    No Handphone
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    {{ $data->user->detailpasien->no_hp }}
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    Status
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    {{ $data->user->detailpasien->status->nama }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-primary shadow mb-4" data-bs-toggle="modal"
                        data-bs-target="#addData{{ $data->id }}"><i class="ti ti-plus"></i>
                        Tambah Tindakan</button>
                    @include('admin.pages.pendaftaran.component.addData')
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Tarif</th>
                                    <th scope="col">Tindakan</th>
                                    <th scope="col">Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ptindakan as $item)
                                    <tr>
                                        <td>{{ $item->dokter->nama }}</td>
                                        <td>{{ $item->dokter->tarif }}</td>
                                        <td>{{ $item->tindakan->nama }}</td>
                                        <td>{{ $item->tindakan->tarif }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
@endsection

@push('custom-scripts')
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
        });
    </script>
@endpush
