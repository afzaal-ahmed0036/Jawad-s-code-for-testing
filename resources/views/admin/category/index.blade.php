@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
       <div class="row">
          <div class="col-lg-8">
           <div class="card">

             @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show">
                <strong>{{ session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
              @endif
           <div class="card-header">All Category</div>
            <table class="table">
              <thead>
               <tr>
                 <th scope="col">SL</th>
                 <th scope="col">Category</th>
                 <th scope="col">User</th>
                 <th scope="col">Create At</th>
                 <th scope="col">Action</th>
              </tr>
             </thead>
           <tbody>
           @php $i = 1; @endphp

  @foreach($categories as $category)

   @php
    $user = App\Models\User::find($category->user_id);
   @endphp
   <tr>
      <td>{{ $i++}}</td>
      <td>{{$category->category_name}}</td>
      <td>{{$user->name}}</td>
      <td>
        @if($category->created_at == null)
        <div>No Date Set</div>
        @else
        {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
        @endif
      </td>
      <td>
        <a href="{{ route('edit.category' , $category->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{ route('delete.category' , $category->id)}}" onclick="return confirm('Are you syre to delete')" class="btn btn-danger">Delete</a>
      </td>
   </tr>
    @endforeach
         </tbody>
      </table>
    </div>
   </div>

           <div class="col-lg-4">
             <div class="card card-default">
                <div class="card-header card-header-border-bttom">
                  <h2>Add Category</h2>
                </div>
                <div class="card-body">
                 <form action="{{route ('store.category')}}" method="post">
                    @csrf
       
                   <div class="form-group">
                     <label for="exampleFormControlInput1">Category</label>
                     <input type="text" name="category_name" class="form-control">
                     @error('category_name')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                   </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                 </form>
              </div>
           </div>
        </div>
      </div>
   </div>
</div>

@endsection
