<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Layanan;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\DokterDataTable;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DokterDataTable $dataTable)
    {
        $layanan = Layanan::all();

        return $dataTable->render('admin.pages.dokter.index', compact('layanan'));
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
                    'nama' => 'required|max:255',
                    'layanan_id' => 'required',
                    'hari' => 'required',
                    'jam' => 'required',
                    'tarif' => 'required',
                ]);

                $datas = [
                    'nama' => request('nama'),
                    'layanan_id' => request('layanan_id'),
                    'hari' => request('hari'),
                    'jam' => request('jam'),
                    'tarif' => request('tarif'),
                ];

                Dokter::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data dokter berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Dokter::findOrFail($id);

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
                    'nama' => 'required|string',
                    'layanan_id' => 'required',
                    'hari' => 'required',
                    'jam' => 'required',
                    'tarif' => 'required',
                ]);

                $data = Dokter::findOrFail($data_id);
                $data->nama = request('nama');
                $data->layanan_id = request('layanan_id');
                $data->hari = request('hari');
                $data->jam = request('jam');
                $data->tarif = request('tarif');
                $data->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data dokter berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Dokter::findOrFail($id);
            $data->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Dokter berhasil dihapus',
        ]);
    }
}
