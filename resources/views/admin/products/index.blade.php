@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
<h4>Product Page</h4>
<a href="{{route ('create.product')}}"><button class="btn btn-info">Add Product</button></a>
<br><br>

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
    <div class="card-header">All Product</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Slug</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
@php($i = 1)
@foreach($products as $product)
<tr>
    <td>{{ $i++}}</td>
    <td>{{$product->name}}</td>
    <td>{{$product->price}}</td>
    <td>{{$product->quantity}}</td>
    <td><img src="{{ asset('/'.$product->image) }}" style="width:80px; height:60px;"></td>
    <td>{{ $product->slug }}</td>
    <td>@if($product->created_at == null)
        <div>No Date Set</div>
        @else
        {{Carbon\Carbon::parse($product->created_at)->diffForHumans()}}
        @endif
    </td>
    <td>
        <a href="{{route('show.product' , $product->id)}}" class="btn btn-primary">Show</a>
        <a href="{{route('edit.product' , $product->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{route('delete.product' , $product->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
    </td>
</tr>
@endforeach
        </tbody>
</table>
    </div>
</div>
        </div>
        {{ $products->links() }}
</div>
</div>

@endsection