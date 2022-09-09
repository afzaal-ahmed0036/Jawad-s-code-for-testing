@extends('layouts.master_home')

@section('home_content')
<main>
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Products</h2>
          <ol>
            <li><a href="{{ route('main.home') }}">Home</a></li>
            <li>Product</li>
          </ol>
        </div>

      </div>
</section><!-- End Breadcrumbs -->
 <section>
<div class="container">
 <div class="row">
  <div class= "pro">
   <h4>Cart</h4>
   <div class="col-md-12">
     <div class="card">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <strong>{{ session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    <div class="card-header">Cart Items</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Product</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
                <!-- <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>
          @php $i = 1; $cart_id = 0; @endphp
          @foreach($userCarts as $userCart)
          @php $cart_id = $userCart->cart_id; @endphp
             <tr>
                <td>{{ $i++}}</td>
                <td><img src="{{ asset( $userCart->image) }}" style="width:100px; height:80px; border-radius:50%;"></td>
                <td>{{ $userCart->unit_price }}</td>
                <td>{{ $userCart->item_quantity }}</td>
                <td>{{ $userCart->unit_price * $userCart->item_quantity }}</td>
                <td>
                <a href="#"><i class="bi bi-delete"></i></a>
                </td>
            </tr>
           @endforeach
        </tbody>
       </table>
      </div>
     </div>
     <div>
     <a href="{{route('shipping' , $cart_id)}}" class="btn btn-primary" style="background-color: #1bbd36;">Check Out</a>
     </div>
    </div>
   </div>
  </div>
</section>
</main>
@endsection