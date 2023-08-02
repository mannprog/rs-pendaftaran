<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Status;
use InvalidArgumentException;
use App\DataTables\ObatDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreObatRequest;
use App\Http\Requests\UpdateObatRequest;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ObatDataTable $dataTable)
    {
        $status = Status::all();
        return $dataTable->render('admin.pages.obat.index', compact('status'));
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
                    'nama' => 'required|max:255|unique:Obats,nama',
                    'stok' => 'required|max:255|',
                    'stok_min' => 'required|max:255|',
                    'harga_jual' => 'required|max:255|',
                    'harga_beli' => 'required|max:255|',
                    'exp' => 'required|max:255|',
                    'statuses_id' => 'required|max:255|',
                ]);

                $datas = [
                    'nama' => request('nama'),
                    'stok' => request('stok'),
                    'stok_min' => request('stok_min'),
                    'harga_jual' => request('harga_jual'),
                    'harga_beli' => request('harga_beli'),
                    'exp' => request('exp'),
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
                    'stok' => 'required|string',
                    'stok_min' => 'required|string',
                    'harga_jual' => 'required|string',
                    'harga_beli' => 'required|string',
                    'exp' => 'required|string',
                    'statuses_id' => 'required',
                ]);

                $data = Obat::findOrFail($data_id);
                $data->nama = request('nama');
                $data->stok = request('stok');
                $data->stok_min = request('stok_min');
                $data->harga_jual = request('harga_jual');
                $data->harga_beli = request('harga_beli');
                $data->exp = request('exp');
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
