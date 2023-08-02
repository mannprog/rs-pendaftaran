<?php

namespace App\Http\Controllers;

use App\DataTables\ObatDataTable;
use App\Models\Obat;
use App\Http\Requests\StoreObatRequest;
use App\Http\Requests\UpdateObatRequest;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ObatDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.obat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreObatRequest $request)
    {
        $dataId = request('data_id');

        try {
            DB::transaction(function () use ($dataId) {
                request()->validate([
                    'nama' => 'required|max:255|unique:Obats,nama',
                    'tarif' => 'required|max:255|',
                    'statuses_id' => 'required|max:255|',
                ]);

                $datas = [
                    'nama' => request('nama'),
                    'tarif' => request('tarif'),
                    'statuses_id' => request('statuses_id'),
                ];

                Obat::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Obat berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $data = Obat::findOrFail($id);

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
                    'tarif' => 'required|string',
                    'statuses_id' => 'required',
                ]);

                $data = Obat::findOrFail($data_id);
                $data->nama = request('nama');
                $data->tarif = request('tarif');
                $data->statuses_id = request('statuses_id');
                $data->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Obat berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            $data = Obat::findOrFail($id);
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
