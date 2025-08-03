@extends('layouts.main')

@section('content')
<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">
        @foreach ($sliders as $key => $slider)
        <div class="carousel-item{{ $key === 0 ? ' active' : '' }}" style="background-image: url({{ asset('storage/' . $slider->img_slider) }});">
          <div class="carousel-container">
            <div class="carousel-content container">
              <h2 class="animate__animated animate__fadeInDown">{{ $slider->judul }}</h2>
              <p class="animate__animated animate__fadeInUp">{{ $slider->deskripsi }}</p>
              <a href="{{ $slider->link_btn }}" class="btn-get-started animate__animated animate__fadeInUp scrollto"> Selengkapnya</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section><!-- End Hero -->



<!-- ======= Services Section ======= -->

<section id="services" class="services">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-3 col-md-6 icon-box" data-aos="fade-up">
        <a href="/data-desa"><div class="icon"><i class="bi bi-pie-chart-fill"></i></div></a>
        <h4 class="title"><a href="/data-desa">Statistik</a></h4>
      </div>

      <div class="col-lg-3 col-md-6 icon-box" data-aos="fade-up">
        <a href="/peta-desa"><div class="icon"><i class="bi bi-map-fill"></i></div></a>
        <h4 class="title"><a href="/peta-desa">Peta Desa</a></h4>
      </div>

      <div class="col-lg-3 col-md-6 icon-box" data-aos="fade-up">
        <a href="/umkm"><div class="icon"><i class="bi bi-basket-fill"></i></div></a>
        <h4 class="title"><a href="/umkm">UMKM Desa</a></h4>
      </div>

      <div class="col-lg-3 col-md-6 icon-box" data-aos="fade-up">
        <a href="/layanan"><div class="icon"><i class="bi bi-card-checklist"></i></div></a>
        <h4 class="title"><a href="/layanan">Layanan</a></h4>
      </div>
    </div>
    
  </div>
</section>



<section id="kepala-desa" class="py-5">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold">Kepala Desa & Statistik Penduduk</h2>
    </div>

    <div class="row align-items-center justify-content-center g-4 g-lg-5">

      <div class="col-lg-5 col-md-8">
        @if($kepalaDesa)
          <div class="kepala-desa-card">
            <div class="img-container">
              <img src="{{ asset('storage/' . $kepalaDesa->foto) }}" alt="{{ $kepalaDesa->nama }}">
            </div>
            <h4 class="mb-1">{{ $kepalaDesa->nama }}</h4>
            <p class="text-muted mb-0">{{ $kepalaDesa->jabatan }}</p>
          </div>
        @else
          <div class="kepala-desa-card">
            <p class="text-muted m-0">Data kepala desa belum tersedia.</p>
          </div>
        @endif
      </div>

      <div class="col-lg-7 col-md-12">
        <div class="row g-4">
          <div class="col-12">
            <div class="statistik-card">
              <div class="icon icon-total"><i class="bi bi-people-fill"></i></div>
              <p class="title">Jumlah Penduduk</p>
              <h3 class="count">{{ $totalPenduduk }}</h3>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="statistik-card">
              <div class="icon icon-laki"><i class="bi bi-gender-male"></i></div>
              <p class="title">Laki-laki</p>
              <h4 class="count">{{ $jumlahLakiLaki }}</h4>
            </div>
          </div>
          
          <div class="col-sm-6">
            <div class="statistik-card">
              <div class="icon icon-perempuan"><i class="bi bi-gender-female"></i></div>
              <p class="title">Perempuan</p>
              <h4 class="count">{{ $jumlahPerempuan }}</h4>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ======= Video Section ======= -->
<section id="services" class="services mx-4">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Video Profile</h2>
    </div>

    <div class="row">
      <div class="col-lg-10 mx-auto">
        <iframe width="100%" height="500" src="{{ $videoProfil->url_video }}" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>


<section class="counts section-bg">
  <div class="container">

    <div class="section-title">
      <h2>Berita Desa</h2>
    </div>

    <div class="row">

      @foreach ($beritas as $berita)
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="count-box news-card">
                    <div class="card">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <p class="card-text">{{ $berita->excerpt }}</p>
                            <div class="news-date">{{ $berita->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="card-footer">
                          <a href="/berita/{{ $berita->slug }}" class="btn-selengkapnya float-end">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

     
      <div class="button" style="text-align: center">
        <a class="btn btn-primary mx-auto" href="/berita" role="button">Lihat Semua</a>
      </div>
      
    </div>

  </div>
</section>

<!-- ======= Buku Tamu Section ======= -->
<section id="buku-tamu" class="buku-tamu section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Buku Tamu</h2>
      <p>Silakan tinggalkan pesan, kesan, atau saran Anda untuk kemajuan desa kita.</p>
    </div>

    <div class="row justify-content-center">

      <!-- Kolom untuk Form (dibuat lebih lebar dan di tengah) -->
      <div class="col-lg-8">
        <div class="form-buku-tamu p-4">

          <!-- Menampilkan pesan sukses setelah mengirim form -->
          @if(session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
          @endif

          <!-- Menampilkan error validasi -->
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <form action="{{ route('guestbook.store') }}" method="POST" role="form">
            @csrf
            <div class="form-group mb-3">
              <label for="nama" class="form-label">Nama Anda</label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama lengkap Anda" required value="{{ old('nama') }}">
            </div>
            <div class="form-group mb-3">
              <label for="asal" class="form-label">Asal/Alamat</label>
              <input type="text" name="asal" class="form-control" id="asal" placeholder="Contoh: Jakarta (Opsional)" value="{{ old('asal') }}">
            </div>
            <div class="form-group mb-3">
              <label for="pesan" class="form-label">Pesan Anda</label>
              <textarea class="form-control" name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- End Buku Tamu Section -->

@endsection