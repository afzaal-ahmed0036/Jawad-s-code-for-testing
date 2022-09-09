@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bttom">
<h2>Update Contact</h2>
        </div>
        <div class="card-body">
       <form action="{{route ('update.contact' , $contact->id)}}" method="GET">
        @csrf
        <div class="form-group">
        <label for="exampleFormControlInput1">Contact Email</label>
        <input type="email" name="email" class="form-control" value="{{$contact->email}}">
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">Contact Phone</label>
        <input type="text" name="phone" class="form-control" value="{{$contact->phone}}">
        </div>
        <div class="form-group">
        <label for="exampleFormControlInput1">Contact Address</label>
        <textarea name="address" class="form-control" rows="3">{{$contact->address}}
</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
       </form>
        </div>
    </div>
</div>

@endsection