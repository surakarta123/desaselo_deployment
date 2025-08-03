<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 footer-info">
                    {{-- Baris kode untuk logo utama sudah dihapus dari sini --}}
                    <h3>{{ $nm_desa }}</h3>
                    <p>
                        Kecamatan {{ $kecamatan }}, Kabupaten {{ $kabupaten }}, <br> Provinsi {{ $provinsi }}, Kode Pos {{ $kode_pos }}<br><br>
                        <strong>Nomor HP :</strong> {{ $no_hp }}<br>
                        <strong>Email :</strong> {{ $email }}<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Menu</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="/">Beranda</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/berita">Berita</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/umkm">Umkm</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/data-desa">Data Desa</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/kontak">Kontak Kami</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Profil Desa</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="/wilayah">Wilayah</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/sejarah">Sejarah</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/visi-misi">Visi & Misi</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/perangkat-desa">Perangkat Desa</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/peta-desa">Peta Desa</a></li>
                    </ul>
                </div>

            </div>

            <!-- KODE BARU UNTUK LOGO DITAMBAHKAN DI SINI -->
            <div class="row footer-logos text-center align-items-center mt-4">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <img src="{{ asset('admin/assets/images/auth/LOGOSELOKOTAK.png') }}" alt="Logo 1" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <img src="{{ asset('admin/assets/images/auth/LOGOSELOKOTAK.png') }}" alt="Logo 2" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <img src="{{ asset('admin/assets/images/auth/LOGOSELOKOTAK.png') }}" alt="Logo 3" class="img-fluid" style="max-height: 80px;">
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <img src="{{ asset('admin/assets/images/auth/LOGOSELOKOTAK.png') }}" alt="Logo 4" class="img-fluid" style="max-height: 80px;">
                </div>
            </div>
            <!-- AKHIR DARI KODE BARU -->

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            <p>
                &copy; Copyright <strong>2025</strong><br>
                KKN Desa Selo Kelompok 31<br>
                Universitas Sebelas Maret
            </p>
        </div>
    </div>
</footer><!-- End Footer -->
