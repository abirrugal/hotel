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
  <a href="{{route('admin.employee')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


    <div class="h4 mb-3 text-center">Employee Add</div>
<form action="{{route('admin.employee.create')}}" method="post" enctype="multipart/form-data">
@csrf

   

<div class="form-row mt-4">

  <div class="col">
  <div class="mb-3">
    <label for="number" class="form-label text-black h6">Name</label>
    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>
  

    <div class="col">
      <div class="mb-3">
        <label for="email" class="form-label text-black h6">Join Date</label>
    
        <input class="date form-control" name="join_date" id="in" type="text" value="{{old('join_date')}}" >  
    
    </div>
    </div>
  
    <div class="col">
      <div class="mb-3">
        <label for="ref" class="form-label text-black h6">Department</label>
        <input type="text" name="department" value="{{old('department')}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
        
      </div>
      </div>
  
  </div>
  
  
  
  <div class="form-row mt-4">
  
 
  
  <div class="col">
  <div class="mb-3">
    <label for="email" class="form-label text-black h6">Section Name</label>
    <input type="text" name="section" value="{{old('section')}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>

  <div class="col">
  <div class="mb-3">
    <label for="email" class="form-label text-black h6">Designation</label>
    <input type="text" name="designation" value="{{old('designation')}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>

  <div class="col">
  <div class="mb-3">
    <label for="email" class="form-label text-black h6">Shift Name</label>
    <input type="text" name="shift_name" value="{{old('shift_name')}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>

  </div>
  

  
  <div class="form-row mt-4">
  
 
  
  <div class="col">
  <div class="mb-3">
    <label for="email" class="form-label text-black h6">Salary Range</label>
    <input type="text" name="salary_range" value="{{old('salary_range')}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>

  <div class="col">
  <div class="mb-3">
    <label for="email" class="form-label text-black h6">Concern</label>
    <input type="text" name="concern" value="{{old('concern')}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>

  <div class="col-3">
    <div class="mb-3 form-group">
      <label for="slider_image" class="form-label text-black h6">Branch Name</label>
      <select class="form-select custom-select"  name="branch"  aria-label="Default select example" placeholder="Select from avilable free room">
        @foreach ($branch as $item)
            
        
        <option value="{{$item->branch}}" >{{$item->branch}}</option>
    
        @endforeach
      </select>
    </div>  
    </div> 

  </div>

  
  
 
  
  <div class="mb-3">
    <label for="email" class="form-label text-black h6">Bank Acc. No</label>
    <input type="text" name="bank_no" value="{{old('bank_no')}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>




 


  
  <div class="h6"> Status</div>

  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="customRadioInline1" name="status" value="Active" class="custom-control-input">
    <label class="custom-control-label" for="customRadioInline1">Active</label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="customRadioInline2" name="status" value="Inactive" class="custom-control-input">
    <label class="custom-control-label" for="customRadioInline2">Inactive</label>
  </div>

<div class="mt-3">
  <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary w-50  mt-3">Submit</button>
  </div></div>

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


</script>


@endsection


@section('before_body')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@endsection


