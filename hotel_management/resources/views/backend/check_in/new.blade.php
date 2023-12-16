@extends('backend.layout.master')

@section('main_content')

{{--  Date Picker   --}}
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
  <a href="{{route('admin.check_in')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


    <div class="h4 mb-3 text-center">Check-in Add</div>
<form action="{{route('admin.check_in.create')}}" method="post" enctype="multipart/form-data">
@csrf

   
<div class="form-row mt-4">

<div class="col-6">
  <div class="mb-3">
    {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
    <input type="text" name="guest" value="{{old('guest')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Guest Name">
    
  </div>
  </div>


  <div class="col-3">
    <div class="mb-3">
      {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
      <input type="number" name="contact" value="{{old('contact')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Contact Number">
      
    </div>
    </div>

  <div class="col-3">
    <div class="mb-3">
      {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
      <input type="email" name="email" value="{{old('email')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Enter email">
      
    </div>
    </div>


</div>



<div class="form-row mt-4">



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



  <div class="col">
    <div class="mb-3 form-group mt-4">
      {{--  <label for="ref" class="form-label text-black h6">Referenced By</label>  --}}
      <input type="text" name="reference" value="{{old('reference')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Referenced By">
      
    </div>
    </div>




</div>




<div class="form-row mt-4">

  <div class="col-6">
    <div class="mb-3">
      {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
      <input type="text" name="age" value="{{old('age')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Age">
      
    </div>
    </div>
  
  
    <div class="col-3">
      <div class="mb-3">
        {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
        <input type="text" name="birth" value="{{old('birth')}}" class="form-control" id="birth" aria-describedby="PriceHelp" placeholder="Birth Date">
        
      </div>
      </div>
  
    <div class="col-3">
      <div class="mb-3">
        {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
        {{-- <input type="text" name="gender" value="{{old('gender')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Gender"> --}}
        

        <select class="custom-select" name="gender" aria-placeholder="Gender">
          <option selected>Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
       
        </select>
      </div>
      </div>
  
  
  </div>




  <div class="form-row mt-4">

    <div class="col-6">
      <div class="mb-3">
        {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
        <input type="text" name="profession" value="{{old('profession')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Profession">
        
      </div>
      </div>
    
    
      <div class="col-3">
        <div class="mb-3">
          {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
          <input type="text" name="pax" value="{{old('pax')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Pax (Guest Quantity)">
          
        </div>
        </div>
    
    
    
    
    </div>



<div class="form-row mt-4">



<div class="col">
  <div class="form-group">
  

    <textarea class="form-control" name="present" id="exampleFormControlTextarea1" placeholder="Present Address" rows="3">{{old('present')}}</textarea>
  </div>

</div>


<div class="col">

  <div class="form-group">
  
    <textarea class="form-control" name="permanent" id="exampleFormControlTextarea1" placeholder="Permanent Address" rows="3">{{old('permanent')}}</textarea>
  </div>


</div>
</div>







  <div class="form-row mt-4">

    <div class="col-6">
      <div class="mb-3">
        {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
        <input type="text" name="country" value="{{old('country')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Country/Nationality">
        
      </div>
      </div>
    
    
      <div class="col-3">
        <div class="mb-3">
          {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
          <input type="number" name="nid" value="{{old('nid')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="NID">
          
        </div>
        </div>
    
      <div class="col-3">
        <div class="mb-3">
          {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
          <input type="text" name="passport" value="{{old('passport')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Passport Info">
          
        </div>
        </div>
    
    
    </div>





    <div class="form-row mt-4">

      <div class="col-6">
    
        <div class="form-group">
  
          <textarea class="form-control" name="purpose" id="exampleFormControlTextarea1" placeholder="Purpose Of Visit" rows="3">{{old('purpose')}}</textarea>
        </div>

        </div>


      
      
        <div class="col-3">
          <div class="mb-3">
            {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
            <input type="text" name="from" value="{{old('from')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Coming From">
            
          </div>
          </div>
      
        <div class="col-3">
          <div class="mb-3">
            {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
            <input type="text" name="next" value="{{old('next')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Next Destination">
            
          </div>
          </div>
      
      
      </div>


      








{{--  <div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Room No</label>
  <select class="form-select custom-select" aria-label="Default select example" name="room_id" id="stock_status">
    @foreach ($room_infos as $room_info)
        
    
    <option value="{{$room_info->id}}" {{$room_info->room_no === $room_info->room_no? 'selected' : '' }}>{{$room_info->room_no}} {{' '.'('. $room_info->room_sts .')'}}</option>
    @endforeach
  </select>
</div>  --}}


<div class="form-row mt-4">
  <div class="col">
  <div class="mb-3">

    <input class="date form-control" name="in" id="in" type="text" value="{{old('in')}}" placeholder="Exp. Arrival Date">  

</div>
</div>

<div class="col">
  <div class="mb-3">

    <input class="date form-control" name="out" id="out" type="text" value="{{old('out')}}" placeholder="Exp. Departure Date">  

</div>
</div>



</div>

<div class="col-3">
  <div class="mb-3">
    {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
    <input type="text" name="method" value="{{old('method')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Payment Method">
    
  </div>
  </div>

<div class="form-group">
  <label for="email" class="form-label text-black h6">Special Notes</label>

  <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="5">{{old('note')}}</textarea>
</div>


<div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary w-50  mt-3">Submit</button>
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

  $('#birth').datepicker({
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
