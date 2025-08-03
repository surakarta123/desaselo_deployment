@extends('layouts.main')

@section('content')
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Kontak Kami</h2>
        </div>

        <div class="row">
            <div class="col-lg-6 d-flex" data-aos="fade-up">
                <div class="info-box">
                    <i class="bi bi-geo-alt-fill"></i>
                    <h3>Lokasi Desa</h3>
                    <div class="card-body p-2">
                        @if ($kontak->lokasi)
                        <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0"
                            marginwidth="0" id="gmap_canvas"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63292.015635939744!2d110.43690015432624!3d-7.492723534893243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a651ccb092703%3A0x7daefc3ea580f00e!2sSelo%2C%20Kec.%20Selo%2C%20Kabupaten%20Boyolali%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1754184531426!5m2!1sid!2sid"></iframe>
                        @else
                        <p>Lokasi tidak tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up">
                <div class="info-box mb-4" style="height: 250px;">
                    <div class="mx-auto pt-4">
                        <i class="bi bi-envelope-fill"></i>
                        <h3>Email Kami</h3>
                        <p>{{ $kontak->email ?? 'Email tidak tersedia' }}</p>
                    </div>
                </div>

                <div class="info-box" style="height: 250px;">
                    <div class="mx-auto pt-4">
                        <i class="bi bi-telephone-fill"></i>
                        <h3>Nomor HP Kami</h3>
                        <p>{{ $kontak->no_hp ?? 'Nomor HP tidak tersedia' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>@endsection