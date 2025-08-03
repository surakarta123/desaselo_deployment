@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Judul Halaman -->
    <h1 class="h3 mb-4 text-gray-800">Detail Permintaan Surat</h1>

    <!-- Info -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5><strong>Nama Pengirim:</strong> {{ $persuratan->nama }}</h5>
            <h5><strong>Jenis Formulir:</strong> {{ $persuratan->jenis_formulir }}</h5>
            <h5><strong>Tanggal Permintaan:</strong> {{ $persuratan->created_at->format('d M Y, H:i') }}</h5>
        </div>
    </div>

    <!-- Jawaban Formulir -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jawaban Formulir</h6>
        </div>
        <div class="card-body">
            @if ($persuratan->jawaban_formulir)
                @foreach ($persuratan->jawaban_formulir as $key => $value)
                    <div class="mb-2">
                        <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}
                    </div>
                @endforeach
            @else
                <p>Belum ada jawaban formulir.</p>
            @endif
        </div>
    </div>

    <!-- Tombol Aksi -->
    <a href="{{ route('admin.persuratan.index') }}" class="btn btn-secondary">← Kembali</a>
    <a href="{{ route('admin.persuratan.print', $persuratan->id) }}" class="btn btn-primary" target="_blank">
        <i class="fas fa-print"></i> Cetak PDF
    </a>

</div>
@endsection
