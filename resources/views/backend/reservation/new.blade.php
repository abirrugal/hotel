@extends('backend.layout.master')

@section('main_content')

<!-- DATE PICKER  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />



@if($errors->any())
@foreach($errors->all() as $error)
 <div class="alert alert-danger m-4">
 {{$error}}
 </div>
@endforeach
@endif



<div class="mt-4 container">
  <a href="{{route('admin.reservation')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


    <div class="h4 mb-3 text-center">Reservation Add</div>
<form action="{{route('admin.reservation.create')}}" method="post" enctype="multipart/form-data">
@csrf

   

<div class="form-row mt-4">
<div class="col">
<div class="mb-3">
  {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
  <input type="number" name="contact" value="{{old('contact')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Contact Number">
  
</div>
</div>



<div class="col">
  <div class="mb-3">
    {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
    <input type="text" name="guest" value="{{old('guest')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Guest Name">
    
  </div>
  </div>



</div>



<div class="form-row mt-4">

  <div class="col">
    <div class="mb-3">
      {{--  <label for="ref" class="form-label text-black h6">Referenced By</label>  --}}
      <input type="text" name="reference" value="{{old('reference')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Referenced By">
      
    </div>
    </div>

<div class="col">
<div class="mb-3">
  {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
  <input type="email" name="email" value="{{old('email')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Enter email">
  
</div>
</div>



</div>


<div class="col">
  <div class="mb-3 form-group">
  <label for="slider_image" class="form-label text-black h6">Room No</label>
  <select class="form-select custom-select js-example-basic-multiple form-control" multiple="multiple" name="room_ids[]" id="room_ids" aria-label="Default select example" placeholder="Select from avilable free room">
    @foreach ($room_infos as $room_info)
        
    
    <option value="{{$room_info->id}}" >{{$room_info->room_no}}</option>
    @endforeach
  </select>
</div>  
</div>  






<div class="form-row mt-4">





  <div class="col">
  <div class="mb-3">  
    <input class="date form-control" name="in" id="in" type="text" value="{{old('in')}}" placeholder="Exp. Check-in Date">  

</div>
</div>

<div class="col">
  <div class="mb-3">

    <input class="date form-control" name="out" id="out" type="text" value="{{old('out')}}" placeholder="Exp. Check-out Date">  

</div>
</div>



</div>



<div class="form-group">
  <label for="email" class="form-label text-black h6">Special Notes</label>

  <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="5">{{old('email')}}</textarea>
</div>


<div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary  mt-3">Submit</button>
</div>

</form>
</div>



<script>


$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
      

    });
});

  $('#in').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'dd mmm yyyy'
  });

  $('#out').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'dd mmm yyyy'
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


