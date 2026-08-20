<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function create()
    {
        $layanans = Layanan::orderBy('nama')->get();

        return view('pesanan.create', compact('layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => ['required', 'exists:layanans,id'],
            'berat' => ['required', 'numeric', 'min:1'],
            'catatan' => ['nullable', 'string', 'max:1000'],
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);

        $berat = $request->berat;
        $totalHarga = $berat * $layanan->harga_per_kg;

        $pesanan = Pesanan::create([
            'user_id' => Auth::id(),
            'layanan_id' => $layanan->id,
            'berat' => $berat,
            'harga_per_kg' => $layanan->harga_per_kg,
            'total_harga' => $totalHarga,
            'status' => 'menunggu',
            'tanggal_masuk' => now()->toDateString(),
            'catatan' => $request->catatan,
        ]);

        return redirect()
            ->route('pesanan.show', $pesanan)
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    public function index()
    {
        $pesanans = Pesanan::with('layanan')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('pesanan.index', compact('pesanans'));
    }

    public function show(Pesanan $pesanan)
    {
        abort_unless(
            $pesanan->user_id === Auth::id(),
            403
        );

        $pesanan->load('layanan');

        return view('pesanan.show', compact('pesanan'));
    }
}