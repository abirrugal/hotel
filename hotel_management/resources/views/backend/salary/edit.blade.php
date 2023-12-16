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

<a href="{{route('admin.salary')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


<h5 class="my-4 text-center">Monthly Salary Edit</h5>


<form action="{{route('admin.salary.update', $info->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')



    <div class="form-row mt-4">

    

      <div class="col">
        <div class="mb-3">
          <label for="salary" class="form-label text-black h6">Main Salary</label>
          <input type="text" name="salary"  value="{{$info->salary}}" class="form-control" id="salary" aria-describedby="PriceHelp">
          
        </div>
        
        </div>

    <div class="col">
    <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Select Month</label>
    
      <label for="start">Start month:</label>
    
      <input type="month" id="date" class="form-control custom-select" name="date"
             min="03" value="{{$info->date}}">
      
    </div>
    </div>



    </div>
    
    
    
    
    <div class="form-row mt-4">
    
  
    
    <div class="col">
    <div class="mb-3">
      <label for="tada" class="form-label text-black h6">Ta Da</label>
      <input type="text" name="tada"  value="{{$info->tada}}" class="form-control" id="tada" aria-describedby="PriceHelp">
      
    </div>
    </div>
    
    
    <div class="col">
    
      <div class="mb-3">
        <label for="reduced" class="form-label text-black h6">Reduced Salary</label>
        <input type="text" name="reduced"  value="{{$info->reduced}}" class="form-control" id="reduced" aria-describedby="PriceHelp">
        
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

