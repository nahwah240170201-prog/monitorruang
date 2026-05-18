<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // VALIDASI SESUAI FORM REGISTER
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:users,nim',
            'password' => 'required',
            'semester' => 'required',
            'matkul' => 'required',
            'kelas' => 'required',
        ]);

        // AMBIL KELAS (radio dari JS)
        $kelas = is_array($request->kelas)
            ? array_values($request->kelas)[0]
            : $request->kelas;

        // CEK 1 KELAS 1 KOMTING
        $cek = User::where('role', 'komting')
            ->where('kelas', $kelas)
            ->exists();

        if ($cek) {
            return back()->with('error', 'kelas ini sudah punya komting');
        }

        // SIMPAN USER
        User::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
            'role' => 'komting',
            'semester' => $request->semester,
            'mata_kuliah' => json_encode($request->matkul),
            'kelas' => $kelas,
        ]);

        return redirect('/login')->with('success', 'register berhasil, silakan login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        // LOGIN HARUS SESUAI FIELD DATABASE (nim + password)
        if (Auth::attempt([
            'nim' => $request->nim,
            'password' => $request->password,
        ])) {

            $user = Auth::user();

            if ($user->role == 'komting') {
                return redirect('/dashboard-komting');
            }

            return redirect('/');
        }

        return back()->with('error', 'nim atau password salah');
    }
}