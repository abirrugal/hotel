@extends('backend.layout.master')
@section('main_content')
    

@if($errors->any())         
@foreach ($errors->all() as $error)
    <div class="alert alert-danger mx-3 p-2">{{$error}}</div>
@endforeach     
@endif

<h5 class="my-4 text-center">Voucher Edit</h5>

<form action="{{route('admin.voucher.update', $voucher->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


 <!-- DATE PICKER  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <div class="form-row mt-4"> 

      <div class="col">
        <div class="mb-3">  
          <label for="slider_image" class="form-label text-black h6">Transaction Date</label>

          <input class="date form-control" name="transaction_date" id="transaction_date" type="text" value="{{old('transaction_date')}}" placeholder="Transaction_date">  
      
      </div>
      </div>
    
    <div class="col">
    <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Voucher Reference</label>
      <input type="text" name="voucher_ref" value="{{$voucher->voucher_ref}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>
    
 
    </div>
    
    {{-- <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Status</label>
      <input type="text" name="discount" value="{{old('discount')}}"  class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div> --}}
    
    <div class="form-row mt-4">
    
      <div class="col">
    
      <div class="mb-3">
        <label for="slider_image" class="form-label text-black h6">Trans Mode</label>
        <select class="form-select custom-select" aria-label="Default select example" name="trans_mode" id="trans_mode">
          <option value="Hotel" {{$voucher->trans_mode === 'Hotel'? 'selected' : '' }}>Hotel</option>
          <option value="Restaurant" {{$voucher->trans_mode === 'Restaurant'? 'selected' : '' }}>Restaurant</option>
          <option value="Laundry" {{$voucher->trans_mode === 'Laundry'? 'selected' : '' }}>Laundry</option>
          <option value="Swimming" {{$voucher->trans_mode === 'Swimming'? 'selected' : '' }}>Swimming</option>
          <option value="Bar" {{$voucher->trans_mode === 'Bar'? 'selected' : '' }}>Bar</option>
          <option value="Gym" {{$voucher->trans_mode === 'Gym'? 'selected' : '' }}>Gym</option>
        </select>
      </div>
      </div>
    
    
      <div class="col">
    
      <div class="mb-3">
        <label for="slider_image" class="form-label text-black h6">Branch/Cost center</label>
        <select class="form-select custom-select" aria-label="Default select example" name="branch" id="trans_mode">
          <option value="Barishal" {{$voucher->branch=== 'Barishal'? 'selected' : '' }}>Barishal</option>
          <option value="Chittagong" {{$voucher->branch=== 'Chittagong'? 'selected' : '' }}>Chittagong</option>
          <option value="Rajshahi" {{$voucher->branch=== 'Rajshahi'? 'selected' : '' }}>Rajshahi</option>
          <option value="Khulna" {{$voucher->branch=== 'Khulna'? 'selected' : '' }}>Khulna</option>
        
        </select>
      </div>
      </div>
      
      <div class="col">
    
      <div class="mb-3">
        <label for="slider_image" class="form-label text-black h6">Voucher Type</label>
        <select class="form-select custom-select" aria-label="Default select example" name="voucher_type" id="trans_mode">
          <option value="Barishal" {{$voucher->branch=== 'Barishal'? 'selected' : '' }}>Barishal</option>
          <option value="Chittagong" {{$voucher->branch=== 'Chittagong'? 'selected' : '' }}>Chittagong</option>
          <option value="Rajshahi" {{$voucher->branch=== 'Rajshahi'? 'selected' : '' }}>Rajshahi</option>
          <option value="Khulna" {{$voucher->branch=== 'Khulna'? 'selected' : '' }}>Khulna</option>
        
        </select>
      </div>
      </div>
    
    
    
      
    </div>
    
    
      
    
    <div class="form-row mt-4">



      <div class="col">
      <div class="mb-3">
        <label for="slider_image" class="form-label text-black h6">Bank Name</label>
        <input type="text" name="bank_name" value="{{$voucher->bank_name}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
        
      </div>
      </div>
      
      <div class="col">
      <div class="mb-3">
        <label for="slider_image" class="form-label text-black h6">Account No</label>
        <input type="text" name="account_no" value="{{$voucher->account_no}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
        
      </div>
      </div>
      
      <div class="col">
        <div class="mb-3">  
          <label for="slider_image" class="form-label text-black h6">Cheque Issue Date</label>
      
          <input class="date form-control" name="chequeissue_date" id="chequeissue_date" type="text" value="{{$voucher->chequeissue_date}}" placeholder="Cheque Issue Date">  
      
      </div>
      </div>
      
      
      </div>


    

    <div class="form-row mt-4">
    
      <div class="col">
        <div class="mb-3">
          <label for="slider_image" class="form-label text-black h6">Ammount</label>
          <input type="number" name="ammount" value="{{$voucher->ammount}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
          
        </div>
        </div>

        <div class="col">
          <div class="mb-3">
            <label for="slider_image" class="form-label text-black h6">Pay Method</label>
            <input type="text" name="pay_method" value="{{$voucher->pay_method}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
          
          </div>
          </div>

        <div class="col">
          <div class="mb-3">
            <label for="slider_image" class="form-label text-black h6">Invoice Reference</label>
            <input type="text" name="invoice_ref" value="{{$voucher->invoice_ref}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
          
          </div>
          </div>



   
    
     
    
    </div>

    <div class="h6"> Status</div>

    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="customRadioInline1" name="status" value="Complete" class="custom-control-input">
      <label class="custom-control-label" for="customRadioInline1">Complete</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="customRadioInline2" name="status" value="Pending" class="custom-control-input">
      <label class="custom-control-label" for="customRadioInline2">Pending</label>
    </div>

    <div class="form-group">
      <label for="email" class="form-label text-black h6">Description</label>
    
      <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5">{{$voucher->description}}</textarea>
    </div>

   
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary w-50  mt-3">Edit</button>
    </div>
</form>

<script type="text/javascript">
  
  $('#transaction_date').datepicker({
      uiLibrary: 'bootstrap4'
  });

  </script>

@endsection

