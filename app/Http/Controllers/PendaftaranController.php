<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Status;
use App\Models\Layanan;
use App\Models\Tindakan;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use InvalidArgumentException;
use App\Models\PendaftaranObat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\PendaftaranTindakan;
use App\DataTables\PendaftaranDataTable;

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
                    'waktu_kunjungan' => 'required|unique:pendaftarans,waktu_kunjungan',
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

        return view('admin.pages.pendaftaran.detail', compact(['data', 'dokter', 'tindakan', 'ptindakan', 'obats', 'pobats']));
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

                // $pendaftaran = PendaftaranTindakan::where('pendaftaran_id', $dataId)->first();
                // $pendaftaran->dokter_id = request('dokter_id');
                // $pendaftaran->tindakan_id = request('tindakan_id');
                // $pendaftaran->save();

                $pendaftaran = PendaftaranTindakan::create([
                    'pendaftaran_id' => $dataId,
                    'dokter_id' => request('dokter_id'),
                    'tindakan_id' => request('tindakan_id'),
                ]);

                // Pembayaran::create([
                //     'pendaftaran_tindakan_id' => $pendaftaran->id,
                // ]);
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Data tindakan berhasil ditambahkan');
    }

    public function delData($id)
    {
        try {
            DB::transaction(function () use ($id) {

                $data = PendaftaranTindakan::findOrFail($id);
                $data->delete();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Data tindakan berhasil dihapus');
    }

    public function addObat()
    {
        try {
            DB::transaction(function () {
                request()->validate([
                    'obat_id' => 'required',
                    'qty' => 'required',
                ]);

                PendaftaranObat::create([
                    'pendaftaran_id' => request('data_id'),
                    'obat_id' => request('obat_id'),
                    'qty' => request('qty'),
                ]);
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Data obat berhasil ditambahkan');
    }

    public function delObat($id)
    {
        try {
            DB::transaction(function () use ($id) {

                $data = PendaftaranObat::findOrFail($id);
                $data->delete();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Data obat berhasil dihapus');
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

    public function export()
    {
        $data = Pendaftaran::all();

        $pdf = Pdf::loadView('admin.pages.pendaftaran.export', compact('data'));

        $pdfContent = $pdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Pendaftaran.pdf"',
            'Cache-Control' => 'public, max-age=60'
        ];

        return new Response($pdfContent, 200, $headers);
    }
}
