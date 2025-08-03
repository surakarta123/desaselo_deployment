<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Persuratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersuratanController extends Controller
{
    public function index()
    {
        $persuratans = Persuratan::latest()->paginate(10);
        return view('admin.persuratan.index', compact('persuratans'));
    }

    public function show($id)
    {
        $persuratan = Persuratan::findOrFail($id);
        return view('admin.persuratan.show', compact('persuratan'));
    }

    public function destroy($id)
    {
        $data = Persuratan::findOrFail($id);
        $data->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    public function generatePdf($id)
    {
        $data = Persuratan::findOrFail($id);
        // Proses generate PDF pakai DomPDF atau convert dari Word

        return response()->download($pdfPath); 
    }
}
