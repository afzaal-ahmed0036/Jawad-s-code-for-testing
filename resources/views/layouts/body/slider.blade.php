@php

$sliders = DB::table('sliders')->get();

@endphp
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

@foreach($sliders as $slider)
        <div class="carousel-item active" style="background-image: url({{ $slider->image }});">
          <div class="carousel-container">
            <div class="carousel-content animate-animated animate__fadeInUp">
             <h2>{{ $slider->title }}</h2>
             <p>{{ $slider->description }}</p>
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

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
</section><!-- End Hero -->
