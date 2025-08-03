<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.gallery.index', [
            'gallerys'  => Gallery::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'media'       => 'required|file|mimes:png,jpg,jpeg,mp4,mov,avi|max:20480',
            'keterangan'  => 'required'
        ], [
            'media.required'       => 'Media wajib diunggah!',
            'media.mimes'          => 'Format yang diizinkan: png, jpg, jpeg, mp4, mov, avi!',
            'keterangan.required'  => 'Keterangan wajib diisi!',
        ]);


        if ($request->hasFile('media')) {
            $path       = 'img-gallery/';
            $file       = $request->file('media');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid() . '.' . $extension;
            $media      = $file->storeAs($path, $fileName, 'public');
            $mimeType   = $file->getClientMimeType(); // tambahkan ini kalau mau
        } else {
            $media = null;
            $mimeType = null;
        }


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Gallery::create([
        'gambar'       => $media,          // nama file yang disimpan
        'keterangan'   => $request->keterangan,
        'user_id'      => auth()->user()->id,
        'tipe'         => $mimeType,       // mime type yang tadi kita ambil dari file
    ]);

        return redirect('/admin/gallery')->with('success', 'Berhasil menambahkan informasi layanan baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit', [
            'gallery'   => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::find($id);
        $validator = Validator::make($request->all(), [
            'keterangan'   => 'required'
        ], [
            'keterangan.required'   => 'Form wajib di,'
        ]);

        if ($request->hasFile('gambar')) {
            if ($gallery->gambar) {
                unlink('.' . Storage::url($gallery->gambar));
            }
            $path       = 'img-gallery/';
            $file       = $request->file('gambar');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = uniqid() . '.' . $extension;
            $gambar     = $file->storeAs($path, $fileName, 'public');
        } else {
            $validator = Validator::make($request->all(), [
                'gambar'       => 'mimes:png,jpg,jpeg',
                'keterangan'   => 'required'
            ], [
                'gambar.mimes'          => 'Format yang di izinkan png,jpg,jpeg !',
                'keterangan.required'   => 'Form wajib di,'
            ]);
            $gambar = $gallery->gambar;
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $gallery->update([
            'gambar'        => $gambar,
            'keterangan'    => $request->keterangan
        ]);

        return redirect('/admin/gallery')->with('success', 'Berhasil memperbarui data gallery');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::find($id);
        unlink('.' . Storage::url($gallery->gambar));
        $gallery->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
