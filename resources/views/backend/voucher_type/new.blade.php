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



<div class="mt-4">
  <a href="{{route('admin.voucher_type')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>


    <div class="h4 mb-3 text-center">Voucher Type Add</div>
<form action="{{route('admin.voucher_type.create')}}" method="post">
@csrf

   

<div class="col">
<div class="mb-3">
  <label for="number" class="form-label text-black h6">Voucher Type.</label>
  <input type="text" name="voucher_type" value="{{old('voucher_type')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Enter voucher type.">
  
</div>
</div>




<div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary w-50  mt-3">Submit</button>
</div>

</form>
</div>



@endsection





