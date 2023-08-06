<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\Models\PendaftaranObat;
use Illuminate\Support\Facades\DB;
use App\Models\PendaftaranTindakan;
use App\DataTables\PembayaranDataTable;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function accept($id)
    {
        try {
            DB::transaction(function () use ($id) {

                $lamaran = Pembayaran::findOrFail($id);
                $lamaran->status = 0;
                $lamaran->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pembayaran::with(['pendaftaran', 'obat'])->find($id);
        $pendaftaran = Pendaftaran::where('id', $data->pendaftaran_id)->first();
        $ptindakans = PendaftaranTindakan::where('pendaftaran_id', $pendaftaran->id)->get();
        $pobats = PendaftaranObat::where('pendaftaran_id', $pendaftaran->id)->get();

        return view('admin.pages.pembayaran.detail', compact(['data', 'pendaftaran', 'ptindakans', 'pobats']));
    }

    public function invoice($id)
    {
        $data = Pembayaran::with(['pendaftaran', 'obat'])->find($id);
        $pendaftaran = Pendaftaran::where('id', $data->pendaftaran_id)->first();
        $ptindakans = PendaftaranTindakan::where('pendaftaran_id', $pendaftaran->id)->get();
        $pobats = PendaftaranObat::where('pendaftaran_id', $pendaftaran->id)->get();

        // return dd($tajaran);
        $pdf = Pdf::loadView('admin.pages.pembayaran.invoice', compact(['data', 'pendaftaran', 'ptindakans', 'pobats']));

        $pdfContent = $pdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Laporan-SPKK.pdf"',
            'Cache-Control' => 'public, max-age=60'
        ];

        return new Response($pdfContent, 200, $headers);
    }
}
