<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SetMenu;

class SetMenuController extends Controller
{
    public function index()
    {
        $setmenus = SetMenu::where('Nama', 'like', '%Menu%')->get();
        return view('setmenu', compact('setmenus'));
    }

    public function prasmanan()
    {
        $setmenus = SetMenu::where('Nama', 'like', '%Prasmanan%')->get();
        return view('prasmanan', compact('setmenus'));
    }

     public function nasikotak()
    {
        $setmenus = SetMenu::where('Nama', 'like', '%Kotak%')->get();
        return view('nasikotak', compact('setmenus'));
    }
}