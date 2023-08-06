<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use InvalidArgumentException;
use App\Models\PendaftaranObat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\PendaftaranTindakan;
use App\DataTables\PembayaranPasienDataTable;

class PembayaranPasienController extends Controller
{
    public function index(PembayaranPasienDataTable $dataTable)
    {
        return $dataTable->render('pasien.pages.pembayaran.index');
    }

    public function show(string $id)
    {
        $data = Pembayaran::with(['pendaftaran', 'obat'])->find($id);
        $pendaftaran = Pendaftaran::where('id', $data->pendaftaran_id)->first();
        $ptindakans = PendaftaranTindakan::where('pendaftaran_id', $pendaftaran->id)->get();
        $pobats = PendaftaranObat::where('pendaftaran_id', $pendaftaran->id)->get();

        return view('pasien.pages.pembayaran.detail', compact(['data', 'pendaftaran', 'ptindakans', 'pobats']));
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
            'Content-Disposition' => 'inline; filename="Invoice.pdf"',
            'Cache-Control' => 'public, max-age=60'
        ];

        return new Response($pdfContent, 200, $headers);
    }

    public function bukti()
    {
        $data_id = request('data_id');

        try {
            DB::transaction(function () use ($data_id) {
                request()->validate([
                    'bukti' => 'required|mimes:mng,jpg,jpeg,svg|max:1048',
                ]);

                $pembayaran = Pembayaran::findOrFail($data_id);
                if (request()->hasFile('bukti')) {
                    $bukti = request()->file('bukti');
                    $filename = $bukti->getClientOriginalName();
                    $bukti->move(public_path('admin/images/bukti'), $filename);
                    $pembayaran->bukti_pembayaran = $filename;
                    $pembayaran->save();
                }
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Bukti Pembayaran berhasil diupload');
    }
}
