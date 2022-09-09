@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bttom">
<h2>Create Contact</h2>
        </div>
        <div class="card-body">
       <form action="{{route ('store.contact')}}" method="post">
        @csrf
        <div class="form-group">
        <label for="exampleFormControlInput1">Contact Email</label>
        <input type="email" name="email" class="form-control" placeholder="Contact Email">
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">Contact Phone</label>
        <input type="text" name="phone" class="form-control" placeholder="Contact Phone">
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">Contact Address</label>
        <textarea name="address" class="form-control" rows="3" placeholder="Contact Address">
</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
       </form>
        </div>
    </div>
</div>

@endsection