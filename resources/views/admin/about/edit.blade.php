@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bttom">
<h2>Create Contact</h2>
        </div>
        <div class="card-body">
     <form action="{{route ('update.about' , $about->id)}}" method="get">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" name="title" class="form-control" value="{{$about->title}}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Short Description</label>    
          <textarea name="short_des" class="form-control" rows="3">{{$about->short_des}}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Long Description</label>
          <textarea name="long_des" class="form-control" rows="3">{{$about->long_des}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
     </form>
        </div>
    </div>
</div>

@endsection