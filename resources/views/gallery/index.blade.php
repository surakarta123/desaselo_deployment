@extends('layouts.main')

@section('content')
    <section class="counts section-bg">
        <div class="section-title">
            <h2>Gallery</h2>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($galerrys as $gallery)
                    <div class="col-lg-3 mb-4">
                        @php
                            $ext = pathinfo($gallery->gambar, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                            $isVideo = in_array(strtolower($ext), ['mp4', 'webm', 'ogg']);
                        @endphp

                        @if ($isImage)
                            <img src="{{ asset('storage/' . $gallery->gambar) }}" class="img-fluid img-thumbnail"
                                alt="Gallery Image"
                                style="width: 100%; height: 200px; object-fit: cover;">
                        @elseif ($isVideo)
                            <video controls class="img-thumbnail"
                                style="width: 100%; height: 200px; object-fit: cover;">
                                <source src="{{ asset('storage/' . $gallery->gambar) }}" type="video/{{ $ext }}">
                                Browser kamu tidak mendukung pemutar video.
                            </video>
                        @else
                            <p class="text-danger">Tipe file tidak dikenali</p>
                        @endif

                        <p class="mt-2 text-center">{{ $gallery->keterangan }}</p>
                    </div>
                @endforeach
            </div>

            <div class="paginate my-3 text-center">
                {{ $galerrys->links() }}
            </div>
        </div>
    </section>
@endsection
