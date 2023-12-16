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
  <a href="{{route('admin.room')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>

    <div class="h4 mb-3 text-center">Room Information Add</div>
<form action="{{route('admin.room.create')}}" method="post" enctype="multipart/form-data">
@csrf

   

<div class="form-row mt-4">
<div class="col">
<div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Room Number</label>
  <input type="text" name="room_no" value="{{old('room_no')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
  
</div>
</div>

<div class="col">
<div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Room Category</label>
  <input type="text" name="category" value="{{old('category')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
  
</div>
</div>
</div>

{{-- <div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Status</label>
  <input type="text" name="discount" value="{{old('discount')}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
  
</div> --}}


<div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Status</label>
  <select class="form-select custom-select" aria-label="Default select example" name="status" id="stock_status">
    <option value="Occupied" {{old('status')=== 'Occupied'? 'selected' : '' }}>Occupied</option>
    <option value="Vacant Dirty" {{old('status')=== 'Vacant Dirty'? 'selected' : '' }}>Vacant Dirty</option>
    <option value="Vacant Ready" {{old('status')=== 'Vacant Ready'? 'selected' : '' }}>Vacant Ready</option>
    <option value="Sleep Out" {{old('status')=== 'Sleep Out'? 'selected' : '' }}>Sleep Out</option>
    <option value="House Use" {{old('status')=== 'House Use'? 'selected' : '' }}>House Use</option>
  </select>
</div>




<div class="form-row mt-4">

<div class="col">
<div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Floor No</label>
  <input type="text" name="floor"  value="{{old('floor')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
  
</div>

</div>

<div class="col">
<div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Services</label>
  <input type="text" name="services"  value="{{old('services')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
  
</div>
</div>



</div>


<div class="form-row mt-4">

  <div class="col">

<div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Room Type</label>
  <input type="text" name="product"  value="{{old('product')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
  
</div>
</div>

<div class="col">

<div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Room Rate</label>
  <input type="number" name="rate"  value="{{old('rate')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
  
</div>
</div>
</div>


<div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary w-50  mt-3">Submit</button>
</div></form>
</div>

{{-- <script type="text/javascript">
  
  CKEDITOR.replace( 'description' );

  </script> --}}

@endsection


