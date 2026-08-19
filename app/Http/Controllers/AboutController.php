<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Tampilkan halaman About (Chendora Café Admin)
     */
    public function index()
    {
        // Mengarahkan ke file: resources/views/chendora/about.blade.php
        return view('chendora.about');
    }
}
