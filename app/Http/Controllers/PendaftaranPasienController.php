<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Status;
use App\Models\Layanan;
use App\Models\Tindakan;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\Models\PendaftaranObat;
use Illuminate\Support\Facades\DB;
use App\Models\PendaftaranTindakan;
use App\DataTables\PendaftaranPasienDataTable;

class PendaftaranPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PendaftaranPasienDataTable $dataTable)
    {
        $layanan = Layanan::all();
        $status = Status::all();

        return $dataTable->render('pasien.pages.pendaftaran.index', compact(['layanan', 'status']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $dataId = request('data_id');

        try {
            DB::transaction(function () use ($dataId) {
                request()->validate([
                    'layanan_id' => 'required',
                    'waktu_kunjungan' => 'required|unique:pendaftarans,waktu_kunjungan',
                    'status_id' => 'required',
                ]);

                $randomNumber = mt_rand(10000, 99999);
                $noDaftar = 'DFTR-' . $randomNumber;

                $datas = [
                    'user_id' => auth()->user()->id,
                    'layanan_id' => request('layanan_id'),
                    'waktu_kunjungan' => request('waktu_kunjungan'),
                    'status_id' => request('status_id'),
                    'no_daftar' => $noDaftar,
                    'tgl_daftar' => today(),
                ];

                $pendaftaran = Pendaftaran::updateOrCreate(['id' => $dataId], $datas);

                Pembayaran::create([
                    'pendaftaran_id' => $pendaftaran->id,
                ]);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data pendaftaran berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pendaftaran::with(['user', 'layanan', 'status', 'dokter', 'tindakan'])->find($id);
        $dokter = Dokter::where('layanan_id', $data->layanan_id)->get();
        $tindakan = Tindakan::all();
        $ptindakan = PendaftaranTindakan::where('pendaftaran_id', $data->id)->get();
        $obats = Obat::all();
        $pobats = PendaftaranObat::where('pendaftaran_id', $data->id)->get();

        return view('pasien.pages.pendaftaran.detail', compact(['data', 'dokter', 'tindakan', 'ptindakan', 'obats', 'pobats']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pendaftaran::findOrFail($id);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        $data_id = request('data_id');

        try {
            DB::transaction(function () use ($data_id) {
                request()->validate([
                    'layanan_id' => 'required',
                    'waktu_kunjungan' => 'required',
                    'status_id' => 'required',
                ]);

                $data = Pendaftaran::findOrFail($data_id);
                $data->user_id = auth()->user()->id;
                $data->layanan_id = request('layanan_id');
                $data->waktu_kunjungan = request('waktu_kunjungan');
                $data->status_id = request('status_id');
                $data->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data pendaftaran berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Pendaftaran::findOrFail($id);
            $data->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Data Pendaftaran berhasil dihapus',
        ]);
    }
}
