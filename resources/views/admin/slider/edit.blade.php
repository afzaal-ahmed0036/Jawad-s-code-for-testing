@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bttom">
<h2>Update Slider</h2>
        </div>
        <div class="card-body">
       <form action="{{route ('update.slider' , $slider->id)}}" method="post"  enctype="multipart/form-data">
        @csrf
          <input type="hidden" name="old_image" value="{{asset($slider->image) }}">
        <div class="form-group">
          <label for="exampleFormControlInput1">Slider Title</label>
          <input type="text" name="title" class="form-control" value="{{$slider->title}}">
        </div>
        <div class="form-group">
         <label for="exampleFormControlInput1">Slider Title</label>
         <textarea class="form-control" name="description" rows="3">{{$slider->description}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Image</label>
          <input type="file" name="image" class="form-control">
        <img src="{{asset($slider->image) }}" style="width:150px; height:100px;">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
       </form>
        </div>
    </div>
</div>

@endsection