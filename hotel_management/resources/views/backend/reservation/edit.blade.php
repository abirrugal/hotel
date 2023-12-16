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


<div class="mt-4 container">
  <a href="{{route('admin.reservation')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


<div class="h4 mb-3 text-center">Reservation Edit</div>

<form action="{{route('admin.reservation.update', $info->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')



    
<div class="form-row mt-4">
  <div class="col">
  <div class="mb-3">
    <label for="number" class="form-label text-black h6">Contact Number</label>
    <input type="number" name="contact" value="{{$info->number}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>
  
  
  
  <div class="col">
    <div class="mb-3">
      <label for="name" class="form-label text-black h6">Guest Name</label>
      <input type="text" name="guest" value="{{$info->guest_name}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
  
  
  
  </div>
  
  
  
  <div class="form-row mt-4">
  
    <div class="col">
      <div class="mb-3">
        <label for="ref" class="form-label text-black h6">Referenced By</label>
        <input type="text" name="reference" value="{{$info->ref_by}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
        
      </div>
      </div>
  
  <div class="col">
  <div class="mb-3">
    <label for="email" class="form-label text-black h6">Email</label>
    <input type="email" name="email" value="{{$info->email}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>
  </div>




  



  <div class="mb-3">
    <label for="slider_image" class="form-label text-black h6">Selected Room</label>

    @foreach ($info->order_rooms as $rinfo)
    @foreach($rinfo->room_infos as $room)
    <button type="button" class="btn btn-primary mx-2">

    
      {{$room->room_no}} <span class="badge badge-light"><a href="{{route('admin.room.delete', $rinfo->id)}}">X</a></span>

    
      
    </button>
    @endforeach
    @endforeach

  </div>  
  
  <label for="slider_image" class="form-label text-black h6">Room No</label>


  <select class="form-select custom-select js-example-basic-multiple" multiple="multiple" name="room_ids[]" id="room_ids" aria-label="Default select example" placeholder="Select from avilable free room">
 

        



 @foreach($room_infos as $value)

      <option value="{{$value->id}}"> 
     
      {{$value->room_no}}

    </option>
  @endforeach 
   
     
  </select>

  
  
  <div class="form-row mt-4">
    <div class="col">
    <div class="mb-3">
      <label for="email" class="form-label text-black h6">Exp. Check-in Date</label>
  
      <input class="date form-control" name="in" id="in" type="text" value="{{$info->arrival_date}}" >  
  
  </div>
  </div>
  
  <div class="col">
    <div class="mb-3">
      <label for="email" class="form-label text-black h6">Exp. Check-out Date</label>
  
      <input class="date form-control" name="out" id="out" type="text" value="{{$info->departure_date}}" >  
  
  </div>
  </div>
  
  
  
  </div>
  
  
  
  <div class="form-group">
    <label for="email" class="form-label text-black h6">Special Notes</label>
  
    <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="5">{{$info->note}}</textarea>
  </div>
  
   
  <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary w-50  mt-3">Edit</button>
  </div>
</form>
</div>
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<style>

  .select2-results__option--selected { display: none;}
  
  </style>

@endsection

@section('before_body')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

