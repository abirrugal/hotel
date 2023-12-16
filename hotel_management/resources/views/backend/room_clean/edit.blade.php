@extends('backend.layout.master')
@section('main_content')
    

@if($errors->any())         
@foreach ($errors->all() as $error)
    <div class="alert alert-danger mx-3 p-2">{{$error}}</div>
@endforeach     
@endif

{{--  Date Picker   --}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<a href="{{route('admin.room_clean')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


<h5 class="my-4 text-center">Room Clean Status Edit</h5>


<form action="{{route('admin.room_clean.update', $info->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')



    <div class="form-row mt-4">
      <div class="col">
    <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Room Number</label>
      
      <input type="text" name="room_no" value="{{$info->room_no}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" disabled>
      
    </div>
  </div>
    
  <div class="col">
    <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Room Category</label>
      <input type="text" name="category" value="{{$info->room_category}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" disabled>
      
    </div>
  </div>
  </div>
    


    
  <div class="form-row mt-4">


    


    <div class="col">
      <div class="mb-3">
        <label for="slider_image" class="form-label text-black h6">Clean Status</label>

        {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
        {{-- <input type="text" name="gender" value="{{old('gender')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Gender"> --}}
        

        <select class="custom-select" name="clean_sts" aria-placeholder="Clean Status">
          <option selected>Clean Status</option>
          <option value="Clean">Clean</option>
          <option value="Guest">Guest</option>
          <option value="Unclean">Unclean</option>
       
        </select>
      </div>
      </div>



    <div class="col">
    <div class="mb-3">
      <label for="Last Clean" class="form-label text-black h6">Last Clean</label>

      
      <div class="col">
        <div class="mb-3">
      
          <input class="date form-control" name="last_clean" id="last_clean" type="text" value="{{$info->last_clean}}" placeholder="Last Clean">  
      
      </div>
      </div>  

    </div>
    </div>

    </div>

   
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary w-50  mt-3">Edit</button>
    </div>
</form>

<script>

  
    $('#last_clean').datepicker({
        uiLibrary: 'bootstrap4'
    });

  </script>


@endsection

