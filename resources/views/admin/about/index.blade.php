@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <h4>About Page</h4>
            <a href="{{route ('add.about')}}"><button class="btn btn-info">Add Contact</button></a>
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
                            <div class="card-header">About Data</div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="5%">SL</th>
                                            <th scope="col" width="15%">Title</th>
                                            <th scope="col" width="25%">Short Description</th>
                                            <th scope="col" width="15%">Long Description</th>
                                            <th scope="col" width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach($abouts as $about)
                                        <tr>
                                            <td>{{ $i++}}</td>
                                            <td>{{$about->title}}</td>
                                            <td>{{$about->short_des}}</td>
                                            <td>{{$about->long_des}}</td>
                                            <td>
                                                <a href="{{route('edit.about' , $about->id)}}" class="btn btn-primary">Edit</a>
                                                <a href="{{route('delete.about' , $about->id)}}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
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