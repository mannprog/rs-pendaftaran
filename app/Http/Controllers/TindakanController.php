<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\TindakanDataTable;
use App\Http\Requests\StoreTindakanRequest;
use App\Http\Requests\UpdateTindakanRequest;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TindakanDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.tindakan.index');
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
    public function store()
    {
        $dataId = request('data_id');

        try {
            DB::transaction(function () use ($dataId) {
                request()->validate([
                    'nama' => 'required|max:255|unique:tindakans,nama',
                    'tarif' => 'required|max:255|',
                    'status' => 'required|max:255|',
                ]);

                $datas = [
                    'nama' => request('nama'),
                    'tarif' => request('tarif'),
                    'status' => request('status'),
                ];

                Tindakan::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Tindakan berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tindakan $tindakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Tindakan::findOrFail($id);

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
                    'status' => 'required|string',
                ]);

                $data = Tindakan::findOrFail($data_id);
                $data->nama = request('nama');
                $data->tarif = request('tarif');
                $data->status = request('status');
                $data->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Tindakan berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Tindakan::findOrFail($id);
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
