<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    // Method untuk menyimpan data dari form buku tamu
    public function store(Request $request)
    {
        // 1. Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'asal' => 'nullable|max:255',
            'pesan' => 'required|min:5',
        ]);

        // 2. Simpan ke database
        Guestbook::create($validatedData);

        // 3. Kembalikan ke halaman utama dengan pesan sukses
        return redirect('/#buku-tamu')->with('success', 'Terima kasih! Pesan Anda telah tersimpan.');
    }
}