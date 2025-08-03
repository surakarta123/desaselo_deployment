@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">

    <!-- Judul Halaman -->
    <h1 class="h3 mb-2 text-gray-800">Data Buku Tamu</h1>
    <p class="mb-4">Berikut adalah daftar semua pesan yang masuk melalui formulir buku tamu.</p>

    <!-- Pesan Sukses (jika ada) -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pesan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 20%;">Nama Pengirim</th>
                            <th style="width: 20%;">Asal/Alamat</th>
                            <th>Pesan</th>
                            <th style="width: 15%;">Waktu Kirim</th>
                            <th style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($guestbooks as $index => $item)
                            <tr>
                                <td>{{ $guestbooks->firstItem() + $index }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->asal ?? '-' }}</td>
                                <td>{{ $item->pesan }}</td>
                                <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <form action="{{ route('admin.guestbook.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data buku tamu.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Link Pagination -->
            <div class="d-flex justify-content-end">
                {{ $guestbooks->links() }}
            </div>

        </div>
    </div>

</div>
@endsection