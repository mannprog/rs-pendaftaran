<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use App\Models\DetailPasien;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\PasienDataTable;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PasienDataTable $dataTable)
    {
        $status = Status::all();
        
        return $dataTable->render('admin.pages.users.pasien.index', compact('status'));
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
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048',
                    'status_id' => 'required',
                ]);

                $datas = [
                    'name' => request('name'),
                    'username' => request('username'),
                    'email' => request('email'),
                    'password' => password_hash(request('password'), PASSWORD_DEFAULT),
                    'is_admin' => 1,
                    'jabatan' => 'pasien',
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

                $user = User::updateOrCreate(['id' => $dataId], $datas);

                $no_rkm = mt_rand(10000000, 99999999);

                DetailPasien::create([
                    'user_id' => $user->id,
                    'no_rkm' => $no_rkm,
                    'status_id' => request('status_id'),
                ]);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data pasien berhasil disimpan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::with('detailpasien')->find($id);

        return view('admin.pages.users.pasien.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::with('detailpasien')->findOrFail($id);

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
                    'foto' => 'sometimes|mimes:mng,jpg,jpeg,svg|max:1048',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|string',
                    'alamat' => 'required|string',
                    'no_hp' => 'required|string',
                    'status_id' => 'required|string',
                ]);

                $user = User::findOrFail($data_id);
                $user->name = request('name');
                $user->email = request('email');
                $user->username = request('username');
                if (request()->hasFile('foto')) {
                    $foto = request()->file('foto');
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('admin/images/user'), $filename);
                    $user->foto = $filename;
                }
                $user->save();

                $detail = DetailPasien::where('user_id', $user->id)->first();
                $detail->tempat_lahir = request('tempat_lahir');
                $detail->tanggal_lahir = request('tanggal_lahir');
                $detail->alamat = request('alamat');
                $detail->no_hp = request('no_hp');
                $detail->status_id = request('status_id');
                $detail->save();
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
