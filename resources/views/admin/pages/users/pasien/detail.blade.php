@extends('admin.layouts.app', ['title' => 'Detail Pasien'])

@section('content')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h3 class="me-3">Detail Pasien</h3>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.pasien.index') }}">Kelola Pasien</a></li>
                        <li class="breadcrumb-item" aria-current="page">Detail Pasien</li>
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
                            <img src="{{ asset('admin/images/user/' . $data->foto) }}" class="img-fluid">
                        </div>
                        <div class="col-lg-9">
                            <h1 class="border-bottom pb-2">{{ $data->name }}</h1>
                            <div class="row align-items-center">
                                <div class="col-5 col-lg-2">
                                    Tempat, Tanggal Lahir
                                </div>
                                <div class="col-1 col-lg-1 text-center">
                                    :
                                </div>
                                <div class="col-6 col-lg-9">
                                    @if ($data->detailpasien->tempat_lahir !== null)
                                        {{ $data->detailpasien->tempat_lahir }},
                                        {{ \Carbon\Carbon::parse($data->detailpasien->tanggal_lahir)->format('d M Y') }}
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
                                    {{ $data->detailpasien->alamat }}
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
                                    {{ $data->detailpasien->no_hp }}
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
                                    @if ($data->detailpasien->status === 'reguler')
                                        Reguler
                                    @elseif ($data->detailpasien->status === 'asuransi')
                                        Asuransi
                                    @else
                                        BPJS
                                    @endif
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
@endsection
