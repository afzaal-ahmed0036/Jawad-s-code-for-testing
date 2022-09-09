@extends('layouts.master_home')

@section('home_content')


<style>

  input{
    height:60px;
    margin-top:20px;
  }
</style>
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Order</h2>
          <ol>
            <li><a href="{{ route('main.home') }}">Home</a></li>
            <li>Order</li>
          </ol>
        </div>

      </div>
    </section>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <strong>{{ session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-success alert-dismissible fade show">
          @foreach($errors->all() as $error)
            <strong>{{ $error}}</strong><br>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
 <div class="container" style="margin-bottom: 62px;">
  
 <div class="row">
    <div class="col-lg-6"> 
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div>
          <i class=""></i>
        </div>
        <div>
          <h4>Address</h4>
          <h6>Shipping Details</h6>
        </div>
        <form action="{{route ('store.shippingAddress')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $cart->id}}" name ="cart_id">
            <div class="form-group">
                <!-- <label for="exampleFormControlInput1">Apartement</label> -->
                <input type="text" name="apartment_no" class="form-control" placeholder="Apartment No/ Door No">
            </div>
            <div class="form-group">
                <!-- <label for="exampleFormControlInput1">Area</label> -->
                <input type="text" name="area" class="form-control" placeholder="Area">
            </div>
            <div class="form-group">
                <!-- <label for="exampleFormControlInput1">Area</label> -->
                <input type="text" name="phone_no" class="form-control" placeholder="Phone">
            </div>
            <div class="form-group">
                <!-- <label for="exampleFormControlInput1">Address</label><br> -->
                <textarea name="address"  class="form-control" rows="3" placeholder="Address" style="margin-top:20px;"></textarea>
        </div>
        <input type="hidden" name="cart_total" value="{{ $cart->total_amount }}">
            <button type="submit" class="btn btn-primary" style="margin-top:10px; width:100px;">Save</button>
        </form>
      </div>
    </section>
  </div>
    <div class="col-lg-6" style="margin-top:60px;">
      <div class="container">
     
      <table>
      <header style="background-color:#1bbd36; height:60px; border-radius:5px; color:white;padding:10px;">
      <h4>Order Detail</h4>
    </header>
      <div class="row" style="height:60px; padding:10px;">
       <div class="col-md-6"> <h6>Grand Total</h6></div>
        <div class="col-md-6"><h6>{{ $cart->total_amount }} Rs</h6></div>
      </div>
    @foreach($userCarts as $userCart)
            <tr>
        
                <td width="140px;"><img src="{{ asset( $userCart->image) }}" style="width:100px; height:80px; border-radius:50%;"></td>
                <!-- <td width="25%">{{ $userCart->unit_price }} Rs</td> -->
                <td width="140px;">{{ $userCart->item_quantity }}</td>
                <td width="50px;">{{ $userCart->unit_price * $userCart->item_quantity }} Rs</td>

            </tr>
    @endforeach
   </table>
   <!-- <div class="row">
      <div class="col-md-6"><strong>Sub Total</strong></div>
      <div class="col-md-6"><strong>{{ $cart->total_amount }} Rs</strong></div>
    </div> -->
    <!-- <div class="row">
      <div class="col-md-6"><strong>Shipping</strong></div>
      <div class="col-md-6"><strong>2000 Rs</strong></div>
    </div> -->
      </div>
     </div>
   </div>
 </div>   
 
  </main><!-- End #main -->
@endsection