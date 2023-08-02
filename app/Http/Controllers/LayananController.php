<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\LayananDataTable;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LayananDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.layanan.index');
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
                    'nama' => 'required|max:255|unique:layanans,nama',
                ]);

                $datas = [
                    'nama' => request('nama'),
                ];

                Layanan::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data poli berhasil disimpan',
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
        $data = Layanan::findOrFail($id);

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
                ]);

                $data = Layanan::findOrFail($data_id);
                $data->nama = request('nama');
                $data->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data poli berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Layanan::findOrFail($id);
            $data->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Petugas berhasil dihapus',
        ]);
    }
}
