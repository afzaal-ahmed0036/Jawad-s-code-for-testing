@extends('layouts.master_home')

@section('home_content')


<style>
    #out_btn{
        background-color:red;
        display:none;
        width:150px; 
        margin-top:5px;
        border-radius:20px;
    }
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
    .message{
        text-align:center;
        width:400px;
        margin-left:auto;
        margin-right:auto;
        height:50px;
        
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
<div class="bg-success message">
    <h4><strong class="text-black">{{ session('success') }}</strong></h4>
</div>
@endif
 <section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset($product->image)}}" alt="">              
            </div>
            <div class="col-lg-6">
            <form action="{{ route('add.cart' , $product->id) }}" method="POST">
                @csrf
               <br> <div>
                    <h5> {{ $product->name }}</h5>
                </div>     
               <br> <div>
                    <h5>Price: {{ $product->price }}</h5>
                    <input type="hidden" name="unit_price" value="{{ $product->price }}">
                </div> 
               <br> <div>
                    <h5>Stock: {{ $product->quantity }}</h5>
                    <input id="quantity" type="text" hidden value="{{ $product->quantity }}">
                </div> 
               <br> <div>
                    <h4>Detail: </h4>
                    <h5> {{ $product->detail }}</h5>
                </div>
                <div id="qty_div">
                  <i onclick="return decreament()" class="bi bi-dash-circle"></i></button>
                   <input type="text" name="qty" id="prod_inp" value="1">
                 <i onclick="return increament()" class="bi bi-plus-circle"></i></button>
                </div>                    
                    
                    <button type="submit" class="btn btn-success" id="cart_btn">Add TO Cart</button>
                    <a href="#" class="btn btn-success" id="out_btn">Out of stock</a>
                    </form>
                       
            </div>
        </div>
    </div>
    </section>

  </main>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function increament()
{
    var x = document.getElementById("prod_inp").value;
    var qty = document.getElementById("quantity").value;
    x = parseInt(x);
   
    if(x < qty)
    {
        x = x+1;
       document.getElementById("prod_inp").value = x;
    }
    else{
         alert('You cannot exceed the maximum range of quantity');
    }

}
function decreament()
{
    var x = document.getElementById("prod_inp").value;
    var qty = document.getElementById("quantity").value;
    x = parseInt(x);
    if(x > 1)
    {
        x = x-1;
       document.getElementById("prod_inp").value = x;
    }
    else{
         alert('The manimum range of quantity is 1');
    }

}
</script>
<script>
    $(document).ready(function(){
        var total_quantity = $("#quantity").val();
      
        if(total_quantity == 0)
        {
            $("#qty_div").hide();
            $("#cart_btn").hide();

            $("#out_btn").show();
        }
    })
</script>