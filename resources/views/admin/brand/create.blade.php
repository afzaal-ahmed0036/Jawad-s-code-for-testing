@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bttom">
<h2>Add New Brand</h2>
        </div>
        <div class="card-body">
       <form action="{{route ('store.brand')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="exampleFormControlInput1">Brand Name</label>
        <input type="text" name="brand_name" class="form-control" placeholder="Brand Name">
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">Brand Image</label>
        <input type="file" name="brand_image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
       </form>
        </div>
    </div>
</div>

@endsection