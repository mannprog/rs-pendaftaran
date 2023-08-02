<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use App\Models\Layanan;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\PendaftaranDataTable;
use App\Models\Dokter;
use App\Models\Pendaftaran;
use App\Models\PendaftaranTindakan;
use App\Models\Tindakan;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PendaftaranDataTable $dataTable)
    {
        $users = User::where('is_admin', 1)->get();
        $layanan = Layanan::all();
        $status = Status::all();

        return $dataTable->render('admin.pages.pendaftaran.index', compact(['users', 'layanan', 'status']));
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
                    'user_id' => 'required',
                    'layanan_id' => 'required',
                    'waktu_kunjungan' => 'required',
                    'status_id' => 'required',
                ]);

                $randomNumber = mt_rand(10000, 99999);
                $noDaftar = 'DFTR-' . $randomNumber;

                $datas = [
                    'user_id' => request('user_id'),
                    'layanan_id' => request('layanan_id'),
                    'waktu_kunjungan' => request('waktu_kunjungan'),
                    'status_id' => request('status_id'),
                    'no_daftar' => $noDaftar,
                    'tgl_daftar' => today(),
                ];

                Pendaftaran::updateOrCreate(['id' => $dataId], $datas);
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

        return view('admin.pages.pendaftaran.detail', compact(['data', 'dokter', 'tindakan', 'ptindakan']));
    }

    public function addData()
    {
        $dataId = request('data_id');

        try {
            DB::transaction(function () use ($dataId) {
                request()->validate([
                    'dokter_id' => 'required',
                    'tindakan_id' => 'required',
                ]);

                PendaftaranTindakan::create([
                    'pendaftaran_id' => $dataId,
                    'dokter_id' => request('dokter_id'),
                    'tindakan_id' => request('tindakan_id'),
                ]);

                // $tindakan = PendaftaranTindakan::where('pendaftaran_id', $dataId)->first();
                // if (!$tindakan) {
                //     $tindakan = new PendaftaranTindakan();
                //     $tindakan->pendaftaran_id = $dataId;
                //     $tindakan->dokter_id = request('dokter_id');
                //     $tindakan->tindakan_id = request('tindakan_id');
                // }
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Data tindakan berhasil ditambahkan');
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
                    'user_id' => 'required',
                    'layanan_id' => 'required',
                    'waktu_kunjungan' => 'required',
                    'status_id' => 'required',
                ]);

                $data = Pendaftaran::findOrFail($data_id);
                $data->user_id = request('user_id');
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
