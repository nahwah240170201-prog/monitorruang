<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim_nidn' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        // VALIDASI KOMTING
        if ($request->role == 'komting') {

            $request->validate([
                'kelas' => 'required'
            ]);

            $cekKomting = User::where('role', 'komting')
                ->where('kelas', $request->kelas)
                ->exists();

            if ($cekKomting) {

                return back()->with(
                    'error',
                    'Kelas tersebut sudah memiliki komting.'
                );
            }
        }

        // SIMPAN USER
        User::create([
            'nama' => $request->nama,
            'nim_nidn' => $request->nim_nidn,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'kelas' => $request->kelas,
        ]);

        return redirect('/register')
            ->with('success', 'Register berhasil!');
    }
}