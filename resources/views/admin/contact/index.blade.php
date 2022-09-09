@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
<h4>Contact Page</h4>
<a href="{{route ('add.contact')}}"><button class="btn btn-info">Add Contact</button></a>
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
    <div class="card-header">All Contact Data</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" width="5%">SL</th>
                <th scope="col" width="15%">Contact Address</th>
                <th scope="col" width="25%">Contact Email</th>
                <th scope="col" width="15%">Contact Phone</th>
                <th scope="col" width="15%">Action</th>
            </tr>
        </thead>
        <tbody>
@php($i = 1)
@foreach($contacts as $contact)
<tr>
    <td>{{ $i++}}</td>
    <td>{{$contact->address}}</td>
    <td>{{$contact->email}}</td>
    <td>{{$contact->phone}}</td>
    <td>
        <a href="{{ route('edit.contact' , $contact->id)}}" class="btn btn-primary">Edit</a>
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