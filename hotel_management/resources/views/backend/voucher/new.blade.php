@extends('backend.layout.master')

@section('main_content')
    
@if($errors->any())
@foreach($errors->all() as $error)
 <div class="alert alert-danger m-4">
 {{$error}}
 </div>
@endforeach
@endif


<!-- DATE PICKER  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<div class="mt-4 container">
  <a href="{{route('admin.voucher')}}"> <div class="btn btn-success float-right mb-2">Manage</div></a>

    <div class="h4 mb-3 text-center">Voucher Add</div>
<form action="{{route('admin.voucher.store')}}" method="post" enctype="multipart/form-data">
@csrf

   
<input type="hidden" value="{{$voucher_id}}" name="client_reg_id">
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
  <input type="text" name="voucher_ref" value="{{old('voucher_ref')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
  
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
      
      @foreach ($trans_mode as $item)
      <option value="{{$item->trans_mode}}" {{old('trans_mode')=== old('trans_mode')? 'selected' : '' }}>{{$item->trans_mode}}</option>

      @endforeach

    </select>
  </div>
  </div>


  <div class="col">

  <div class="mb-3">
    <label for="slider_image" class="form-label text-black h6">Branch/Cost center</label>
    <select class="form-select custom-select" aria-label="Default select example" name="branch" id="trans_mode">

      @foreach ($branch as $item)
      <option value="{{$item->name}}" {{old('branch')=== old('branch')? 'selected' : '' }}>{{$item->name}}</option>

      @endforeach
    
    </select>
  </div>
  </div>


  <div class="col">

    <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Voucher Type</label>
      <select class="form-select custom-select" aria-label="Default select example" name="voucher_type" id="trans_mode">
  
        @foreach ($voucher_type as $item)
        <option value="{{$item->voucher_type}}" {{old('voucher_type')=== old('voucher_type')? 'selected' : '' }}>{{$item->voucher_type}}</option>
  
        @endforeach
      
      </select>
    </div>
    </div>





</div>






<div class="form-row mt-4">



<div class="col">
<div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Bank Name</label>
  <input type="text" name="bank_name" value="{{old('bank_name')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
  
</div>
</div>

<div class="col">
<div class="mb-3">
  <label for="slider_image" class="form-label text-black h6">Account No</label>
  <input type="text" name="account_no" value="{{old('account_no')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
  
</div>
</div>

<div class="col">
  <div class="mb-3">  
    <label for="slider_image" class="form-label text-black h6">Cheque Issue Date</label>

    <input class="date form-control" name="chequeissue_date" id="chequeissue_date" type="text" value="{{old('chequeissue_date')}}" placeholder="Cheque Issue Date">  

</div>
</div>


</div>


{{--  <div class="col">
  <div class="mb-3 form-group">
  <label for="slider_image" class="form-label text-black h6">Client's Name</label>
  <select class="form-select custom-select js-example-basic-multiple form-control" multiple="multiple" name="client_ids[]" id="client_ids" aria-label="Default select example" placeholder="Select Client.">
    @foreach ($client_infos as $client_info)
        
    
    <option value="{{$client_info->id}}" >{{$client_info->room_no}}</option>
    @endforeach
  </select>
</div>  
</div>    --}}





<div class="form-row mt-4">

  <div class="col">
    <div class="mb-3">
      <label for="slider_image" class="form-label text-black h6">Ammount</label>
      <input type="number" name="ammount" value="{{old('ammount')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
      
    </div>
    </div>

    <div class="col">
      <div class="mb-3">
        <label for="slider_image" class="form-label text-black h6">Pay Method</label>
        <input type="text" name="pay_method" value="{{old('pay_method')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
        
      </div>
      </div>

    <div class="col">
      <div class="mb-3">
        <label for="slider_image" class="form-label text-black h6">Invoice Reference</label>
        <input type="text" name="invoice_ref" value="{{old('invoice_ref')}}" class="form-control" id="slider_image" aria-describedby="PriceHelp">
        
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

    <div class="col">

    <div class="form-group">
      <label for="email" class="form-label text-black h6">Description</label>
    
      <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5">{{old('description')}}</textarea>
    </div>
    </div>





    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary w-50  mt-3">Submit</button>
    </div>  </form>
</div>

<script type="text/javascript">
  
  $('#transaction_date').datepicker({
      uiLibrary: 'bootstrap4'
  });

  $('#chequeissue_date').datepicker({
      uiLibrary: 'bootstrap4'
  });

  </script>

@endsection

@section('before_body')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@endsection

