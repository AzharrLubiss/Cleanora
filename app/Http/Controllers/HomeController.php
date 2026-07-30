<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda.
     */
    public function index()
    {
        // Ambil 3 layanan terbaru untuk ditampilkan di halaman utama
        $layanans = Layanan::latest()->take(3)->get();

        return view('home', compact('layanans'));
    }

    /**
     * Menampilkan seluruh daftar layanan.
     */
    public function layanan()
    {
        // Ambil semua layanan dan urutkan berdasarkan nama
        $layanans = Layanan::orderBy('nama', 'asc')->get();

        return view('layanan', compact('layanans'));
    }
}
