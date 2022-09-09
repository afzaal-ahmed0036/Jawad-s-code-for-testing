@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bttom">
<h2>Update Brand</h2>
        </div>
        <div class="card-body">
       <form action="{{route ('update.brand' , $brand->id)}}" method="post"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="old_image" value="{{asset($brand->brand_image) }}">
        <div class="form-group">
        <label for="exampleFormControlInput1">Brand Name</label>
        <input type="text" name="brand_name" class="form-control" value="{{$brand->brand_name}}">
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">Brand Image</label>
        <input type="file" name="brand_image" class="form-control">
        <img src="{{asset($brand->brand_image) }}" style="width:150px; height:100px;">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
       </form>
        </div>
    </div>
</div>

@endsection