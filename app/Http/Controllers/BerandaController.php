<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function utama()
    {
        // Mengambil seluruh data yang ada dalam tabel menu
        $menu = Menu::all();

        // Pergi ke halaman Beranda dengan membawa data Menu
        return view('beranda', compact('menu'));
    }
}
