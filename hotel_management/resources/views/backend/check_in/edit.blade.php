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
  <a href="{{route('admin.check_in')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


<div class="h4 mb-3 text-center">{{$title}}</div>

<form action="{{route('admin.check_in.update', $info->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')



   
<div class="form-row mt-4">

  <div class="col-6">
    <div class="mb-3">
      {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
      <input type="text" name="guest" value="{{$info->guest_name}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Guest Name">
      
    </div>
    </div>
  
  
    <div class="col-3">
      <div class="mb-3">
        {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
        <input type="number" name="contact" value="{{$info->number}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Contact Number">
        
      </div>
      </div>
  
    <div class="col-3">
      <div class="mb-3">
        {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
        <input type="email" name="email" value="{{$info->email}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Enter email">
        
      </div>
      </div>
  
  
  </div>
  
  

  <div class="my-2 ">
    <div class="form-label text-black h6 my-2">Selected Room</div>

    @foreach ($info->order_rooms as $rinfo)
    @foreach($rinfo->room_infos as $room)
    <button type="button" class="btn btn-primary mx-1">

    
      {{$room->room_no}} <span class="badge badge-light"><a href="{{route('admin.room.delete', $rinfo->id)}}">X</a></span>

    
      
    </button>
    @endforeach
    @endforeach

  </div> 
  
  <div class="form-row mt-3">

 

    <div class="col">
      <div class="mb-3 form-group">
      <label for="slider_image" class="form-label text-black h6">Room No</label>
      <select class="form-select custom-select js-example-basic-multiple form-control" multiple="multiple" name="room_ids[]" id="room_ids" aria-label="Default select example" placeholder="Select from avilable free room">

        {{--  @foreach ($info->order_rooms as $rinfo)
        @foreach($rinfo->room_infos as $room)

        <option value="{{$room->id}}" selected >{{$room->room_no}}</option>


        @endforeach
        @endforeach  --}}

        @foreach ($room_infos as $room_info)
            
        
        <option value="{{$room_info->id}}" >{{$room_info->room_no}}</option>

        @endforeach
      </select>
    </div>  
    </div>  
  
  
  
    <div class="col">
      <div class="mb-3 form-group mt-4">
        {{--  <label for="ref" class="form-label text-black h6">Referenced By</label>  --}}
        <input type="text" name="reference" value="{{$info->reference}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Referenced By">
        
      </div>
      </div>
  
  
  
  
  </div>
  
  
  
  
  <div class="form-row mt-4">
  
    <div class="col-6">
      <div class="mb-3">
        {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
        <input type="text" name="age" value="{{$info->age}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Age">
        
      </div>
      </div>
    
    
      <div class="col-3">
        <div class="mb-3">
          {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
          <input type="text" name="birth" value="{{$info->birth_date}}" class="form-control" id="birth" aria-describedby="PriceHelp" placeholder="Birth Date">
          
        </div>
        </div>
    
      <div class="col-3">
        <div class="mb-3">
          {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
          {{-- <input type="text" name="gender" value="{{$info->gender}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Gender"> --}}
          

          <select class="custom-select" name="gender" aria-placeholder="Gender">
            <option selected>Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
         
          </select>

        </div>
        </div>
    
    
    </div>
  
  
  
  
    <div class="form-row mt-4">
  
      <div class="col">
        <div class="mb-3">
          {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
          <input type="text" name="profession" value="{{$info->profession}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Profession">
          
        </div>
        </div>
      
      
        <div class="col">
          <div class="mb-3">
            {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
            <input type="text" name="pax" value="{{$info->pax}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Pax (Guest Quantity)">
            
          </div>
          </div>
      
    
      
      
      </div>
  
  
  

  
  

  <div class="form-row mt-4">



    <div class="col">
      <div class="form-group">
      
    
        <textarea class="form-control" name="present" id="exampleFormControlTextarea1" placeholder="Present Address" rows="3">{{$info->present_address}}</textarea>
      </div>
    
    </div>
    
    
    <div class="col">
    
      <div class="form-group">
      
        <textarea class="form-control" name="permanent" id="exampleFormControlTextarea1" placeholder="Permanent Address" rows="3">{{$info->permanent_address}}</textarea>
      </div>
    
    
    </div>
    </div>
  
  
  
  
  
    <div class="form-row mt-4">
  
      <div class="col-6">
        <div class="mb-3">
          {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
          <input type="text" name="country" value="{{$info->country}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Country/Nationality">
          
        </div>
        </div>
      
      
        <div class="col-3">
          <div class="mb-3">
            {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
            <input type="number" name="nid" value="{{$info->nid}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="NID">
            
          </div>
          </div>
      
        <div class="col-3">
          <div class="mb-3">
            {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
            <input type="text" name="passport" value="{{$info->passport}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Passport Info">
            
          </div>
          </div>
      
      
      </div>
  
  
  
  
  
      <div class="form-row mt-4">
  
        <div class="col-6">
      
          <div class="form-group">
    
            <textarea class="form-control" name="purpose" id="exampleFormControlTextarea1" placeholder="Purpose Of Visit" rows="3">{{$info->visit_purpose}}</textarea>
          </div>
  
          </div>
  
  
        
        
          <div class="col-3">
            <div class="mb-3">
              {{--  <label for="number" class="form-label text-black h6">Contact Number</label>  --}}
              <input type="text" name="from" value="{{$info->coming_from}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Coming From">
              
            </div>
            </div>
        
          <div class="col-3">
            <div class="mb-3">
              {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
              <input type="text" name="next" value="{{$info->next_destination}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Next Destination">
              
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
  
      <input class="date form-control" name="in" id="in" type="text" value="{{$info->arrival_date}}" placeholder="Exp. Arrival Date">  
  
  </div>
  </div>
  
  <div class="col">
    <div class="mb-3">
  
      <input class="date form-control" name="out" id="out" type="text" value="{{$info->departure_date}}" placeholder="Exp. Departure Date">  
  
  </div>
  </div>
  
  
  
  </div>
  
  <div class="col-3">
    <div class="mb-3">
      {{--  <label for="email" class="form-label text-black h6">Email</label>  --}}
      <input type="text" name="pay_method" value="{{$info->payment_method}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Payment Method">
      
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
      $('.js-example-basic-multiple').select2({
        
  
      });
  });
  
    $('#in').datepicker({
        uiLibrary: 'bootstrap4'
    });
  
    $('#out').datepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#birth').datepicker({
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
