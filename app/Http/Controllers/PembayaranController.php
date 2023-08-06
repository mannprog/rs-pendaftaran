<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\Models\PendaftaranTindakan;
use App\DataTables\PembayaranDataTable;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PembayaranDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.pembayaran.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pendaftaran::with(['user', 'layanan', 'status', 'dokter', 'tindakan'])->find($id);
        $dokter = Dokter::where('layanan_id', $data->layanan_id)->get();
        $obats = Obat::all();
        $ptindakan = PendaftaranTindakan::where('pendaftaran_id', $data->id)->get();
        $pembayarans = Pembayaran::where('pendaftaran_tindakan_id', $data->id)->get();

        return view('admin.pages.pembayaran.detail', compact(['data', 'dokter', 'obats', 'ptindakan', 'pembayarans']));
    }

    public function addData()
    {
        try {
            DB::transaction(function () {
                request()->validate([
                    'obat_id' => 'required',
                    'qty' => 'required',
                ]);

                Pembayaran::create([
                    'pendaftaran_tindakan_id' => request('data_id'),
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

    public function delData($id)
    {
        try {
            DB::transaction(function () use ($id) {

                $data = Pembayaran::findOrFail($id);
                $data->delete();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Data obat berhasil dihapus');
    }
}
