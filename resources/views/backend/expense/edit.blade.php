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
  <a href="{{route('admin.expense')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


<div class="h4 mb-3 text-center">Expense Edit</div>

<form action="{{route('admin.expense.update', $info->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')



    
<div class="form-row mt-4">

  <div class="col">
  <div class="mb-3">
    <label for="number" class="form-label text-black h6">Title</label>
    <input type="text" name="title" value="{{$info->title}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>
  

    <div class="col">
      <div class="mb-3">
        <label for="email" class="form-label text-black h6">Expense Date</label>
    
        <input class="date form-control" name="date" id="in" type="text" value="{{$info->date}}" >  
    
    </div>
    </div>
  
    <div class="col">
      <div class="mb-3">
        <label for="ref" class="form-label text-black h6">Reson</label>
        <input type="text" name="reson" value="{{$info->reson}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
        
      </div>
      </div>
  
  </div>
  
  
  
  <div class="form-row mt-4">
  
 
  
  <div class="col">
  <div class="mb-3">
    <label for="email" class="form-label text-black h6">Amount</label>
    <input type="text" name="amount" value="{{$info->amount}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>


 

  <div class="col">
  <div class="mb-3">
    <label for="email" class="form-label text-black h6">Expense Method</label>
    <input type="text" name="method" value="{{$info->method}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
    
  </div>
  </div>

  </div>


  <div class="col-3">
    <div class="mb-3 form-group">
      <div class="form-label text-black h6">Expense By</div>
      <select class="form-select custom-select js-example-basic-multiple py-4"  name="expense_by" id="js-example-basic-multiple" aria-label="Default select example" placeholder="Select from avilable free room">

        <option value="{{$info->by}}" selected>{{$info->by}}</option>

        @foreach ($employees as $employees)
            
        
        <option value="{{$employees->name}}" >{{$employees->name}}</option>
    
        @endforeach
      </select>
    </div>  
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
  
  
  </script>

<style>

  .select2-results__option--selected { display: none;}
  
  </style>

@endsection

@section('before_body')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

