@extends('backend.layout.master')

@section('main_content')
    
@if($errors->any())
@foreach($errors->all() as $error)
 <div class="alert alert-danger m-4">
 {{$error}}
 </div>
@endforeach
@endif



<div class="mt-4 container">
  <a href="{{route('admin.salary')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>

    <div class="h4 mb-3 text-center">Monthly Salary Add</div>
<form action="{{route('admin.salary.create')}}" method="post" enctype="multipart/form-data">
@csrf

   

<div class="form-row mt-4">
<div class="col">
<div class="mb-3">

  
  <div class="mb-3">
    <label for="name" class="form-label text-black h6">Select Employee</label>
    <select class="form-select custom-select" aria-label="Default select example" name="name" id="name">

      @foreach ($employee as $item)
          
    
      <option value="{{$item->name}}" {{old('name')=== old('name')? 'selected' : '' }}>{{$item->name}}</option>
      @endforeach
    </select>
  </div>


</div>
</div>

<div class="col">
<div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Select Date</label>

  {{-- <label for="date">Start month:</label> --}}

  <div class="d-flex">

  <input type="month" id="date" class="form-control" name="date"
         min="03" value="">

  </div>
  
</div>
</div>
</div>


 






<div class="form-row mt-4">

<div class="col">
<div class="mb-3">
  <label for="salary" class="form-label text-black h6">Main Salary</label>
  <input type="text" name="salary"  value="{{old('salary')}}" class="form-control" id="salary" aria-describedby="PriceHelp">
  
</div>

</div>

<div class="col">
<div class="mb-3">
  <label for="tada" class="form-label text-black h6">Ta Da</label>
  <input type="text" name="tada"  value="{{old('tada')}}" class="form-control" id="tada" aria-describedby="PriceHelp">
  
</div>
</div>


<div class="col">

  <div class="mb-3">
    <label for="reduced" class="form-label text-black h6">Reduced Salary</label>
    <input type="text" name="reduced"  value="{{old('reduced')}}" class="form-control" id="reduced" aria-describedby="PriceHelp">
    
  </div>
  </div>

</div>



<div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary w-50  mt-3">Submit</button>
</div>

</form>
</div>

<script type="text/javascript">
  



  </script>

@endsection


