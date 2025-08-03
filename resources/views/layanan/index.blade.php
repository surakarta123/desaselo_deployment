@extends('layouts.main')

@section('content')
    <section class="counts section-bg">
        <div class="section-title">
            <h2>Layanan</h2>
        </div>
        
        {{-- FORM PILIH JENIS FORMULIR --}}
        <div class="container mb-4">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm p-4">
                        <h5 class="mb-3">Pilih Jenis Formulir yang Ingin Kamu Isi:</h5>
                        <form action="{{ route('formulir.pilih') }}" method="GET">
                            <div class="mb-3">
                                <select name="jenis" class="form-select" required>
                                    <option value="">-- Pilih Jenis Formulir --</option>
                                    <option value="kebenaran_kelahiran">SPTJM Kebenaran Kelahiran</option>
                                    <option value="pengajuan_akta_kelahiran">SPTJM Pengajuan Akta Kelahiran</option>
                                    <option value="peristiwa_kependudukan">SPTJM Peristiwa Kependudukan</option>
                                    <option value="kebenaran_pasangan">SPTJM Kebenaran Sebagai Pasangan Suami Istri</option>
                                    <option value="kebenaran_orangtua">SPTJM Kebenaran Orang Tua yang Meninggal</option>
                                    <option value="kebenaran_kematian">SPTJM Kebenaran Kematian</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Isi Formulir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- KONTEN LAYANAN --}}
        <div class="container">
            <div class="row">
                @foreach ($layanans as $layanan)
                    <div class="col-lg-4">
                        <div class="accordion" id="accordionExample{{ $layanan->id }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $layanan->id }}" aria-expanded="true"
                                        aria-controls="collapse{{ $layanan->id }}">
                                        {{ $layanan->layanan }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $layanan->id }}" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample{{ $layanan->id }}">
                                    <div class="accordion-body">
                                        {!! $layanan->persyaratan !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
