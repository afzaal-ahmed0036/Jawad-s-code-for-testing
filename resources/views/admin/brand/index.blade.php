@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
<h4>Contact Page</h4>
<a href="{{route ('add.brand')}}"><button class="btn btn-info">Add Brand</button></a>
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
    <div class="card-header">All Brands</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" width="5%">SL</th>
                <th scope="col" width="15%">Brand Name</th>
                <th scope="col" width="25%">Brand Image</th>
                <th scope="col" width="25%">Created at</th>
                <th scope="col" width="15%">Action</th>
            </tr>
        </thead>
        <tbody>
@php($i = 1)
@foreach($brands as $brand)
<tr>
    <td>{{ $i++}}</td>
    <td>{{$brand->brand_name}}</td>
    <td><img src="{{ asset('/'.$brand->brand_image) }}" style="width:80px; height:60px;"></td>
    <td>@if($brand->created_at == null)
        <div>No Date Set</div>
        @else
        {{Carbon\Carbon::parse($brand->created_at)->diffForHumans()}}
        @endif
    </td>
    <td>
        <a href="{{route('edit.brand' , $brand->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{route('delete.brand' , $brand->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
    </td>
</tr>
@endforeach
        </tbody>
</table>
    </div>
</div>
        </div>
</div>
</div>

@endsection