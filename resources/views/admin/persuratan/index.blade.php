@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Permintaan Surat</h1>
    <p class="mb-4">Berikut adalah daftar permintaan surat yang masuk.</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Permintaan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengirim</th>
                            <th>Jenis Formulir</th>
                            <th>Jawaban Formulir</th>
                            <th>Waktu Kirim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($persuratans as $index => $item)
                            <tr>
                                <td>{{ $persuratans->firstItem() + $index }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_formulir }}</td>
                                <td>
                                    <a href="{{ route('admin.persuratan.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat Jawaban
                                    </a>
                                </td>
                                <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('admin.persuratan.generate', $item->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-print"></i> Cetak PDF
                                    </a>
                                    <form action="{{ route('admin.persuratan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data permintaan surat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                {{ $persuratans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
