@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
<h4>Admin Messages</h4>
<!-- <a href="{{route ('add.contact')}}"><button class="btn btn-info">Add Contact</button></a> -->
<br><br>

<div class="col-md-12">
    <div class="card">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <strong>{{ session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card-header">All Messages</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
@php($i = 1)
@foreach($messages as $message)
<tr>
    <td>{{ $i++}}</td>
    <td>{{$message->name}}</td>
    <td>{{$message->email}}</td>
    <td>{{$message->subject}}</td>
    <td>{{$message->message}}</td>
    <td>
        <a href="{{ route('delete.message' , $message->id)}}" class="btn btn-primary">Delete</a>
    </td>
</tr>
@endforeach
        </tbody>
</table>
    </div>
</div>
        </div>
</div>
</div>

@endsection