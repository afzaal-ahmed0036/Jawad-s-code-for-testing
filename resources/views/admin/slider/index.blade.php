@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
<h4>Home Slider</h4>
<a href="{{route ('create.slider')}}"><button class="btn btn-info">Add Slider</button></a>
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
    <div class="card-header">All Slider</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Slider Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
@php($i = 1)
@foreach($sliders as $slider)
<tr>
    <td>{{ $i++}}</td>
    <td>{{$slider->title}}</td>
    <td>{{$slider->description}}</td>
    <td><img src="{{ asset('/'.$slider->image) }}" style="width:80px; height:60px;"></td>
    <td>
        <a href="{{route('edit.slider' , $slider->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{route('delete.slider' , $slider->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
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