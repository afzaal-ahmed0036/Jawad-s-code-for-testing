
<style>
    main{
        /* margin-top: 20px; */
        margin-bottom:20px;
    }
</style>
@extends('layouts.master_home')

@section('home_content')
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8" style="margin-top:100px!important;">
<div class="card card-default">
<div class="card-header card-header-border-bottom">
        <h4><strong>Update User Profile</strong></h4>
</div>
@if(session('success'))
<div class="bg-success p-2">
    <strong class="text-white">{{ session('success') }}</strong>
</div>
@endif
@if(session('error'))
<div>
    <strong>{{ session('error') }}</strong>
</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card-body">
  <form class="form-pill" method ="POST" action="{{ route('NormalUser.update')}}"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <!-- <label for="exampleFormControlInput1">Profile photo</label><br> -->
        <img src="{{ asset($user->profile_photo_path)}}" alt="" style="width:100px; height:100px;"><br>
        <input type="file" name="profile_photo_path" class="form-control rounded-pill">
        <input type="hidden"  name="old_image" value="{{ $user['profile_photo_path'] }}">
    </div><br>
    <div class="form-group">
        <label>User Name</label>
        <input type = "text" class="form-control rounded-pill" maxlength="25" name = "name" value="{{ $user['name']}}">
    </div><br>
    <div class="form-group">
        <label>Email</label>
        <input type = "text" class="form-control rounded-pill"  name = "email" value="{{ $user['email']}}">
    </div><br>
    
    <button type="submit" class="btn btn-primary btn-default">Update</button>
  </form>
</div>
</div>
</div>
</div> <!-- row ended -->
@endsection