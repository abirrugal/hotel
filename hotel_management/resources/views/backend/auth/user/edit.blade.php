@extends('backend.layout.master')
@section('main_content')
    

@if($errors->any())         
@foreach ($errors->all() as $error)
    <div class="alert alert-danger mx-3 p-2">{{$error}}</div>
@endforeach     
@endif

<h5 class="my-4 text-center">Room Information Edit</h5>

<form action="{{route('admin.room.update', $info->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')



    <div class="form-row mt-4">
      <div class="col">
    <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Room Number</label>
      <input type="text" name="room_no" value="{{$info->room_no}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
  </div>
    
  <div class="col">
    <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Room Category</label>
      <input type="text" name="category" value="{{$info->room_category}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
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
        <option value="Occupied" {{$info->status === 'Occupied'? 'selected' : '' }}>Occupied</option>
        <option value="Vacant Dirty" {{$info->status === 'Vacant Dirty'? 'selected' : '' }}>Vacant Dirty</option>
        <option value="Vacant Ready" {{$info->status === 'Vacant Ready'? 'selected' : '' }}>Vacant Ready</option>
        <option value="Sleep Out" {{$info->status === 'Sleep Out'? 'selected' : '' }}>Sleep Out</option>
        <option value="House Use" {{$info->status === 'House Use'? 'selected' : '' }}>House Use</option>
      </select>
    </div>
    
    
    
<div class="form-row mt-4">

  <div class="col">
  <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Floor No</label>
      <input type="text" name="floor"  value="{{$info->floor_no}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>

  </div>
    
  <div class="col">
    <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Services</label>
      <input type="text" name="services"  value="{{$info->service}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
  </div>
  
  
  
  </div>
    
  <div class="form-row mt-4">

    <div class="col">
  
  <div class="mb-3">      <label for="slider_image" class="form-label text-black h6">Room Type</label>
      <input type="text" name="product"  value="{{$info->product_name}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
    
    <div class="col">
    <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Room Rate</label>
      <input type="number" name="rate"  value="{{$info->room_rate}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
    </div>

   
      <button type="submit" class="btn btn-primary mt-3 w-100">Edit</button>

</form>



@endsection

