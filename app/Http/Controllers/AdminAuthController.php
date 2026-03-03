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

  public function login(Request $request)
{
    $credentials = [
        'Username' => $request->Username,
        'password' => $request->password
    ];

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->Level === 'Admin') {
            return redirect()->route('Laporan');
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