@extends('backend.layout.master')
@section('main_content')
    

@if($errors->any())         
@foreach ($errors->all() as $error)
    <div class="alert alert-danger mx-3 p-2">{{$error}}</div>
@endforeach     
@endif

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


<div class="mt-4">
  <a href="{{route('admin.trans_mode')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


<div class="h4 mb-3 text-center">Trans Mode Edit</div>

<form action="{{route('admin.trans_mode.update', $info->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')



  
  <div class="col">
    <div class="mb-3">
      <label for="number" class="form-label text-black h6">Trans Mode Name.</label>
      <input type="text" name="trans_mode" value="{{$info->trans_mode}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Enter Trans Mode Name.">
      
    </div>
    </div>
  
   
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary w-50  mt-3">Edit</button>
    </div>
</form>
</div>


@endsection


