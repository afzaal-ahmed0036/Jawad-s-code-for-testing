@extends('admin.admin_master')

@section('admin')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <strong>{{ session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bttom">
<h2>Add New Product</h2>
        </div>
        <div class="card-body">
       <form action="{{route ('update.product' , $product->id )}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Price</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Quantity</label>
            <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Image</label>
            <input type="file" name="image" class="form-control"><br>
            <img src="{{ asset($product->image) }}" alt="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product detail</label><br>
            <textarea name="detail"  class="form-control" rows="3">{{ $product->detail }}</textarea>
       </div>
        <button type="submit" class="btn btn-primary">Update</button>
       </form>
        </div>
    </div>
</div>

@endsection