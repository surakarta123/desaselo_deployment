<?php

// 1. Ubah namespace dari App\Http\Controllers\Admin menjadi ini
namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;

// 2. Ubah nama kelas dari GuestbookController menjadi ini
class AdminGuestbookController extends Controller
{
    /**
     * Menampilkan halaman daftar buku tamu.
     */
    public function index()
    {
        // Kode di dalam method ini tidak perlu diubah
        $guestbooks = Guestbook::latest()->paginate(10);
        return view('admin.guestbook.index', compact('guestbooks'));
    }

    /**
     * Menghapus data buku tamu.
     */
    public function destroy(Guestbook $guestbook)
    {
        // Kode di dalam method ini tidak perlu diubah
        $guestbook->delete();
        return redirect()->route('admin.guestbook.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
