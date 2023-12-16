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
  <a href="{{route('admin.employee')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


<div class="h4 mb-3 text-center">Employee Edit</div>

<form action="{{route('admin.employee.update', $info->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')



    

  <div class="form-row mt-4">

    <div class="col">
    <div class="mb-3">
      <label for="number" class="form-label text-black h6">Name</label>
      <input type="text" name="name" value="{{$info->name}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
    
  
      <div class="col">
        <div class="mb-3">
          <label for="email" class="form-label text-black h6">Join Date</label>
      
          <input class="date form-control" name="join_date" id="in" type="text" value="{{$info->join_date}}" >  
      
      </div>
      </div>
    
      <div class="col">
        <div class="mb-3">
          <label for="ref" class="form-label text-black h6">Department</label>
          <input type="text" name="department" value="{{$info->department}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
          
        </div>
        </div>
    
    </div>
    
    
    
    <div class="form-row mt-4">
    
   
    
    <div class="col">
    <div class="mb-3">
      <label for="email" class="form-label text-black h6">Section Name</label>
      <input type="text" name="section" value="{{$info->section}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
  
    <div class="col">
    <div class="mb-3">
      <label for="email" class="form-label text-black h6">Designation</label>
      <input type="text" name="designation" value="{{$info->designation}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
  
    <div class="col">
    <div class="mb-3">
      <label for="email" class="form-label text-black h6">Shift Name</label>
      <input type="text" name="shift_name" value="{{$info->shift_name}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
  
    </div>
    
  
    
    <div class="form-row mt-4">
    
   
    
    <div class="col">
    <div class="mb-3">
      <label for="email" class="form-label text-black h6">Salary Range</label>
      <input type="text" name="salary_range" value="{{$info->salary_range}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
  
    <div class="col">
    <div class="mb-3">
      <label for="email" class="form-label text-black h6">Concern</label>
      <input type="text" name="concern" value="{{$info->concern}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
  
    <div class="col">
    <div class="mb-3">
      <label for="email" class="form-label text-black h6">Branch</label>
      <input type="text" name="branch" value="{{$info->branch}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
  
    </div>
  
    
    
   
    
    <div class="mb-3">
      <label for="email" class="form-label text-black h6">Bank Acc. No</label>
      <input type="text" name="bank_no" value="{{$info->bank_no}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
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
  
  
  
   <div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary w-50  mt-3">Edit</button>
    </div>  </div>
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

