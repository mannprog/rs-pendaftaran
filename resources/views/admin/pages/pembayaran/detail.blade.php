@extends('admin.layouts.app', ['title' => 'Detail Pembayaran'])

@section('content')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h3 class="me-3">Detail Pembayaran</h3>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pembayaran.index') }}">Kelola Pembayaran</a></li>
                        <li class="breadcrumb-item" aria-current="page">Detail Pembayaran</li>
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1 class="mb-0">INVOICE</h1>
                    <a href="{{ route('invoice', $data->id) }}" target="_blank" class="btn btn-sm btn-primary shadow"><i
                            class="ti ti-download"></i>
                        Download</a>
                </div>
                <div class="card-body">
                    <div class="mb-3 border-bottom pb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Nama Pasien: {{ $data->pendaftaran->user->name }}
                            </div>
                            <div class="text-end">
                                Tanggal: {{ \Carbon\Carbon::parse($data->pendaftaran->waktu_kunjungan)->format('d M Y') }}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                No Daftar: {{ $data->pendaftaran->no_daftar }}
                            </div>
                            <div class="text-end">
                                Waktu: {{ \Carbon\Carbon::parse($data->pendaftaran->waktu_kunjungan)->format('H:i') }}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-start">
                                Layanan: {{ $data->pendaftaran->layanan->nama }}
                            </div>
                            <div class="text-end">
                                Status: @if ($data->status === 0)
                                    Sudah Bayar
                                @else
                                    Belum Bayar
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Keterangan</th>
                                        <th scope="col" class="text-center">Harga</th>
                                        <th scope="col" class="text-center">Jumlah</th>
                                        <th scope="col" class="text-center">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $jumlah = 1;
                                        $subTarif = 0;
                                        $subHarga = 0;
                                        $totalHarga = 0;
                                    @endphp

                                    @foreach ($ptindakans as $item)
                                        @php
                                            $subTarif = $item->dokter->tarif * $jumlah;
                                        @endphp
                                        <tr>
                                            <td><b>{{ $item->tindakan->nama }}</b><br>({{ $item->dokter->nama }})</td>
                                            <td class="text-center">{{ $item->dokter->tarif }}</td>
                                            <td class="text-center">{{ $jumlah }}</td>
                                            <td class="text-center">{{ $subTarif }}</td>
                                        </tr>
                                    @endforeach

                                    @foreach ($pobats as $item)
                                        @php
                                            $subHarga = $item->obat->harga_jual * $item->qty;
                                        @endphp
                                        <tr>
                                            <td>{{ $item->obat->nama }}</td>
                                            <td class="text-center">{{ $item->obat->harga_jual }}</td>
                                            <td class="text-center">{{ $item->qty }}</td>
                                            <td class="text-center">{{ $subHarga }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    @php
                                        $totalHarga = $subTarif + $subHarga;
                                    @endphp
                                    <tr>
                                        <td colspan="3" class="text-end"><b>Total:</b></td>
                                        <td class="text-center">{{ $totalHarga }}</td>
                                    </tr>
                                </tfoot>
                            </table>

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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1 class="mb-0">Bukti Pembayaran</h1>
                    @if ($data->status === 0)
                        <a href="#" class="btn btn-sm btn-secondary shadow disabled">Sudah Dikonfirmasi</a>
                    @else
                        <form action="{{ route('acc.bukti', $data->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success shadow"><i class="ti ti-check"></i>
                                Konfirmasi</button>
                        </form>
                    @endif
                </div>
                <div class="card-body">
                    @if ($data->bukti_pembayaran == null)
                        <div class="text-center mb-3">
                            Belum ada pembayaran
                        </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <img src="{{ asset('admin/images/bukti/' . $data->bukti_pembayaran) }}" alt="">
                        </div>
                    @endif
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
