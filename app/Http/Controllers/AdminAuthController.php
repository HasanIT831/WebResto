<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    // ================= REGISTER =================
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:8',
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ],[
            'username.min' => 'Username minimal 8 karakter',
            'password.min' => 'Password minimal 8 karakter',
            'email.email' => 'Email harus menggunakan format yang benar (contoh: user@email.com)'
        ]);

        User::create([
            'Username' => $request->username,
            'Nama' => $request->nama,
            'Email' => $request->email,
            'password' => Hash::make($request->password),
            'Level' => 'Publik'
        ]);

        return redirect()->route('login')
            ->with('success','Akun berhasil dibuat');
    }

    // ================= LOGIN =================
    public function login(Request $request)
    {
        $request->validate([
            'Username' => 'required|min:8',
            'password' => 'required|min:8'
        ],[
            'Username.min' => 'Username minimal 8 karakter',
            'password.min' => 'Password minimal 8 karakter'
        ]);

        $credentials = [
            'Username' => $request->Username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->Level === 'Admin') {
                return redirect()->route('laporan.index');
            }

            return redirect()->route('dashboard.page');
        }

        return back()->with('error', 'Username atau Password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}