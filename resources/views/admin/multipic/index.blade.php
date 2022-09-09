@extends('admin.admin_master')

@section('admin')

<div class="py-12">
    <div class="container">
       <div class="row">
          <div class="col-lg-8">


       <h4>Multi Image</h4>
        <br><br>
        <div class="row">
@foreach($images as $image)
           <div class="col-md-4 mt-5">
             <div class="card">
               <img src="{{ asset('/'.$image->image) }}" style="width:160px; height:150px;">
             </div>
           </div>
@endforeach
        </div>

           </div>
           <div class="col-lg-4">
             <div class="card card-default">
                <div class="card-header card-header-border-bttom">
                  <h2>multi Picture</h2>
                </div>
                <div class="card-body">
                 <form action="{{route ('store.image')}}" method="post"  enctype="multipart/form-data">
                    @csrf
       
                   <div class="form-group">
                     <label for="exampleFormControlInput1">Image</label>
                     <input type="file" name="image[]" class="form-control" multiple="">
                     @error('image')
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
