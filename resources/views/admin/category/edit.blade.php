@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bttom">
<h2>Update Category</h2>
        </div>
        <div class="card-body">
       <form action="{{route ('update.category' , $category->id)}}" method="post">
        @csrf
        <div class="form-group">
        <label for="exampleFormControlInput1">Brand Name</label>
        <input type="text" name="category_name" class="form-control" value="{{$category->category_name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
       </form>
        </div>
    </div>
</div>

@endsection