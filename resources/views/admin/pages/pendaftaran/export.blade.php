<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pendaftaran</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 10px;
        }

        th {
            text-align: center;
            background-color: #f2f2f2;
            border: 1px solid #000000;
            padding: 8px;
        }

        td {
            text-align: left;
            border: 1px solid #000000;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Laporan Pendaftaran</h1>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>No Daftar</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Layanan</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Waktu Kunjungan</th>
                    <th>Status Pendaftaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td class="text-center">{{ $item->no_daftar }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->tgl_daftar)->format('d M Y') }}</td>
                        <td class="text-center">{{ $item->layanan->nama }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->waktu_kunjungan)->format('d M Y') }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->waktu_kunjungan)->format('H:i') }}</td>
                        <td class="text-center">{{ $item->status->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
            <!-- Tambahkan data pendaftaran lainnya di sini -->
        </table>
    </div>
</body>

</html>
