@extends('admin.admin_master')

@section('admin')

<div class="card card-default">
<div class="card-header card-header-border-bottom">
        <h2>Update User Profile</h2>
</div>
@if(session('success'))
<div>
    <strong>{{ session('success') }}</strong>
</div>
@endif
<div class="card-body">
  <form class="form-pill" method ="POST" action="{{ route('update.user.profile')}}"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Profile photo</label><br>
        <input type="file" name="profile_photo_path"><br>
        <input type="hidden"  name="admin"><br>
        <input type="hidden"  name="old_image" value="{{ $user['profile_photo_path'] }}"><br>
        <img src="{{ asset($user->profile_photo_path)}}" alt="" style="width:100px; height:100px;">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput3">User Name</label>
        <input type = "text" class="form-control" name = "name" value="{{ $user['name']}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput3">Email</label>
        <input type = "text" class="form-control" name = "email" value="{{ $user['email']}}">
    </div>
    
    <button type="submit" class="btn btn-primary btn-default">Save</button>
  </form>
</div>
</div>

@endsection