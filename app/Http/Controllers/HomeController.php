<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Kirim notifikasi login berhasil
        session()->flash('success', 'Selamat datang di Chendora Café 🍧 Anda berhasil login!');
        
        // Redirect ke halaman utama
        return redirect()->route('chendora');
    }
}
