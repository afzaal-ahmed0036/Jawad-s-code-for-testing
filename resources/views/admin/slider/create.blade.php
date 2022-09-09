@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bttom">
<h2>Add Slider</h2>
        </div>
        <div class="card-body">
       <form action="{{route ('store.slider')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Slider Title</label>
          <input type="text" name="title" class="form-control" placeholder="Slider Title">
        </div>
        <div class="form-group">
         <label for="exampleFormControlInput1">Slider Title</label>
         <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Image</label>
          <input type="file" name="image" class="form-control">
        </div>
          <button type="submit" class="btn btn-primary">Save</button>
       </form>
        </div>
    </div>
</div>

@endsection