<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailPasien;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request): RedirectResponse
    {
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $data = [
            $fieldType => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            Auth::check();
            if (Auth::user()->is_admin != 0) {
                return redirect()->route('pasien.dashboard');
            } else {
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->with('loginError', 'Email atau Password Salah!');
    }

    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function prosesRegistrasi()
    {
        try {
            DB::transaction(function () {
                request()->validate([
                    'name' => 'required|max:255',
                    'username' => 'required|unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:4',
                    'foto' => 'sometimes|mimes:mng,jpg,jpeg,svg|max:1048',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|string',
                    'alamat' => 'required|string',
                    'no_hp' => 'required|string',
                    'status_id' => 'required|string',
                ]);

                $user = User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'username' => request('username'),
                    'password' => password_hash(request('password'), PASSWORD_DEFAULT),
                    'is_admin' => 1,
                    'jabatan' => 'pasien',
                ]);

                $randomNumber = mt_rand(10000000, 99999999);
                $no_rkm = 'RKM-' . $randomNumber;

                DetailPasien::create([
                    'user_id' => $user->id,
                    'no_rkm' => $no_rkm,
                    'tempat_lahir' => request('tempat_lahir'),
                    'tanggal_lahir' => request('tanggal_lahir'),
                    'alamat' => request('alamat'),
                    'no_hp' => request('no_hp'),
                    'status_id' => request('status_id'),
                ]);
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silahkan Login...');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}
