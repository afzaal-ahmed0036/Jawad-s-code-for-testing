@extends('layouts.master_home')

@section('home_content')


<style>
    .btn-success{
        background-color: #1bbd36;
        /* border-radius:0px; */
        height: 36px;
        margin-top: -4px;
       --bs-btn-hover-border-color: #1bbd36;
       --bs-btn-active-bg: #1bbd36;
       --bs-btn-bg: #1bbd36;
    }
    #cart_btn{
        background-color: #1bbd36;
        width:150px; 
        margin-top:5px;
        border-radius:20px;
    }
    #prod_inp{
        width:50px; 
        height:35px;
        border:none;
        text-align:center;
    }
    #qty_div{
        text-align:center;
        width: 150px;
        /* margin-left: 439px; */
        border:1px solid black; 
        border-radius:20px;
    }
    i:hover{
   color: #1bbd36;
    }
</style>
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
 @if(session('success'))
<div>
    <h4><strong class="text-black">{{ session('success') }}</strong></h4>
</div>
@endif
 <section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <div class="container">
     
            <table>
             <header style="background-color:#1bbd36; height:60px; border-radius:5px; color:white;padding:10px;">
              <h4>Order Detail</h4>
             </header>
             <div class="row" style="height:60px; padding:10px;">
                <div class="col-md-6"> <h6>Grand Total</h6></div>
                <div class="col-md-6"><h6>{{ $total_amount}} Rs</h6></div>
             </div>
        @foreach($userCarts as $userCart)
                <tr>
                    <td width="140px;"><img src="{{ asset( $userCart->image) }}" style="width:100px; height:80px; border-radius:50%;"></td>
                    <!-- <td width="25%">{{ $userCart->unit_price }} Rs</td> -->
                    <td width="140px;">{{ $userCart->item_quantity }}</td>
                    <td width="50px;">{{ $userCart->unit_price * $userCart->quantity }} Rs</td>

                </tr>
        @endforeach
            </table>
            <div class="row mt-5">
                <div class="col-md-6"><strong>Sub Total</strong></div>
                <div class="col-md-6"><strong>{{ $total_amount }} Rs</strong></div>
        </div>

     </div>                       
    </div>
    <div class="mt-5">
        <a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">Pay with paypal</a>
        <a class="btn btn-primary m-3" href="{{ url('stripe') }}">Pay with stripe</a>
        @if(\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            {{ \Session::forget('error') }}
        @endif
        @if(\Session::has('success'))
            <div class="alert alert-success">{{ \Session::get('success') }}</div>
            {{ \Session::forget('success') }}
        @endif
    </div>
   </div>
 </div>
</section>

  </main>
@endsection

