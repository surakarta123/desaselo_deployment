@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">
  
      <div class="section-title">
        <h2>{{ $petaDesa->judul }}</h2>
      </div>
  
      <div class="row">
        <div class="col-lg-10 mx-auto p-3">
          <iframe 
            width="100%" 
            height="400" 
            frameborder="0" 
            style="border:0" 
            allowfullscreen 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63292.015635939744!2d110.43690015432624!3d-7.492723534893243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a651ccb092703%3A0x7daefc3ea580f00e!2sSelo%2C%20Kec.%20Selo%2C%20Kabupaten%20Boyolali%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1754184531426!5m2!1sid!2sid">
          </iframe>
        </div>
      </div>
    </div>
  </section>
@endsection