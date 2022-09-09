@php
  $total = 0;
  if(Auth::user())
  $usercarts = App\Models\Cart::where('user_id' , Auth::user()->id)->first();
  else
  $ipcarts = App\Models\Cart::where('system_ip' , request()->ip())->first();
@endphp
@if(Auth::user())
  @if($usercarts)
    @if($usercarts->total_count != 0)
      @php
        $total = $usercarts->total_count;
      @endphp
    @endif
  @endif
@else
  @if($ipcarts->total_count != 0)
      @php
        $total = $ipcarts->total_count;
      @endphp
  @endif
@endif
<style>
#noti{
    margin-top: -18px;
    margin-right: -32px;
    font-size: 11px;
    height: 18px;
    
}

</style>
<header id="header" class="fixed-top">
       
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html"><span>Com</span>pany</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>

          <li><a href="{{ route('main.home') }}" class="active">Home</a></li>

          <li class="dropdown"><a href="{{ route('about') }}"><span>About</span></a>
            <ul>
              <!-- <li><a href="{{ route('about') }}">About Us</a></li> -->
              <!-- <li><a href="team.html">Team</a></li> -->
              <!-- <li><a href="testimonials.html">Testimonials</a></li> -->
              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
            </ul>
          </li>

          <!-- <li><a href="services.html">Services</a></li> -->
          <!-- <li><a href="{{ route('portfolio') }}">Portfolio</a></li> -->
          <li><a href="{{ route('product') }}">Product</a></li>
          <!-- <li><a href="pricing.html">Pricing</a></li>
          <li><a href="blog.html">Blog</a></li> -->
          <li><a href="{{ route('home.message') }}">Contact</a></li>
          @guest
          <li><a href="{{route('login')}}">Login</a></li>
          @else
          @can('admin')
          <li><a href=" {{ route('dashboard') }}">{{ Auth::user()->name }}</a></li> 
         @else
          <li><a href=" {{ route('Normaluser.profile') }}">{{ Auth::user()->name }}</a></li>
          @endcan
          <li><a href=" {{ route('logout') }}">Logout</a></li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <div id="noti">{{ $total }}</div>

        <a href="{{ route('cart.item') }}" ><i class="bi bi-cart-fill"></i></a>
        <a href="#" class="facebook"><i class="bu bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bu bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->