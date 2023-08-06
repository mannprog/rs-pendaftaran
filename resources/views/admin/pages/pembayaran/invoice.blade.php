<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details address {
            font-style: normal;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .invoice-footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>Invoice</h1>
            <p>Date: {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
        </div>
        <div class="invoice-details">
            <p>Bill To:</p>
            <address>
                Nama Pasien: {{ $data->pendaftaran->user->name }}<br>
                Tanggal: {{ \Carbon\Carbon::parse($data->pendaftaran->waktu_kunjungan)->format('d M Y') }}<br>
                No Daftar: {{ $data->pendaftaran->no_daftar }}<br>
                Layanan: {{ $data->pendaftaran->layanan->nama }}<br>
                Status: @if ($data->status === 0)
                    Sudah Bayar
                @else
                    Belum Bayar
                @endif
            </address>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Kuantiti</th>
                    <th>Sub Harga</th>
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
                        $totalHarga += $subTarif;
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
                        $totalHarga += $subHarga;
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
                <tr>
                    <td colspan="3" class="text-end"><b>Total:</b></td>
                    <td class="text-center">{{ $totalHarga }}</td>
                </tr>
            </tfoot>
        </table>
        <div class="invoice-footer">
            <p>Thank you for your business!</p>
        </div>
    </div>
</body>

</html>
