<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\PetugasDataTable;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PetugasDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.users.petugas.index');
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
                    'name' => 'required|max:255',
                    'username' => 'required|unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:4',
                    'jabatan' => 'required',
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048'
                ]);

                $datas = [
                    'name' => request('name'),
                    'username' => request('username'),
                    'email' => request('email'),
                    'password' => password_hash(request('password'), PASSWORD_DEFAULT),
                    'is_admin' => 0,
                    'jabatan' => request('jabatan'),
                ];

                request()->validate([
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048'
                ]);

                if (request()->hasFile('foto')) {
                    $foto = request()->file('foto');
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('admin/images/user'), $filename);
                    $datas['foto'] = $filename;
                }

                User::updateOrCreate(['id' => $dataId], $datas);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data petugas berhasil disimpan',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrFail($id);

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
                    'name' => 'required|string',
                    'username' => 'required|string',
                    'email' => 'required|email',
                    'jabatan' => 'required',
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048'
                ]);

                $user = User::findOrFail($data_id);
                $user->name = request('name');
                $user->email = request('email');
                $user->username = request('username');
                $user->jabatan = request('jabatan');
                if (request()->hasFile('foto')) {
                    $foto = request()->file('foto');
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('admin/images/user'), $filename);
                    $user->foto = $filename;
                }
                $user->save();
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data petugas berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = User::findOrFail($id);
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
