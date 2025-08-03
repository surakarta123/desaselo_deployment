@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-header bg-primary">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title fw-semibold text-white">Tambah Gallery</h5>
                    </div>
                    <div class="col-6 text-right">
                        <a href="/admin/gallery" type="button" class="btn btn-warning float-end">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/admin/gallery" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="media" class="form-label">Gambar / Video <span style="color: red">*</span></label>
                        <input class="form-control" type="file" id="media" name="media" accept="image/*,video/*" onchange="previewMedia()">
                        @error('media')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div id="preview-container" class="mt-3 text-muted">Belum ada media dipilih.</div>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan"
                            value="{{ old('keterangan') }}">
                        @error('keterangan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary m-1 float-end">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewMedia() {
        const file = document.getElementById('media').files[0];
        const container = document.getElementById('preview-container');
        container.innerHTML = '';

        if (file) {
            const url = URL.createObjectURL(file);
            if (file.type.startsWith('image/')) {
                container.innerHTML = `<img src="${url}" class="img-fluid" style="max-height:300px; border-radius: 5px;">`;
            } else if (file.type.startsWith('video/')) {
                container.innerHTML = `<video controls style="max-height:300px; border-radius: 5px;">
                                          <source src="${url}" type="${file.type}">
                                       </video>`;
            }
        } else {
            container.innerHTML = `Belum ada media dipilih.`;
        }
    }
</script>
@endsection
