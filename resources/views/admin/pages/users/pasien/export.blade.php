<!DOCTYPE html>
<html>

<head>
    <title>Data Pasien</title>

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
    <h1 style="text-align: center;">Daftar Data Pasien</h1>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>No RKM</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>No Handphone</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td class="text-center">{{ $item->detailpasien->no_rkm }}</td>
                        <td class="text-center">{{ $item->detailpasien->tempat_lahir }}</td>
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($item->detailpasien->tanggal_lahir)->format('d M Y') }}</td>
                        <td class="text-center">{{ $item->detailpasien->no_hp }}</td>
                        <td class="text-center">{{ $item->detailpasien->status->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
            <!-- Tambahkan data pendaftaran lainnya di sini -->
        </table>
    </div>
</body>

</html>
