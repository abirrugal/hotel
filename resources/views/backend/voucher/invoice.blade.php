@extends('backend.layout.master')
@section('main_content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{--  <script src="{{asset('assets/js/print.js')}}"></script>  --}}

  <div class="container px-5 pt-5">
  <button class=" print btn btn-info">Print</button>
  </div>
  
<div id="voucher_invoice">
<div class="container px-5">

{{--  <div class="d-flex justify-content-center">  --}}

{{--  </div>  --}}



    <div class="blockquote text-center my-3 py-2 border rounded" style="
        background-image: initial !important;
    background-position-x: initial !important;
    background-position-y: initial !important;
    background-size: initial !important;
    background-repeat-x: initial !important;
    background-repeat-y: initial !important;
    background-attachment: initial !important;
    background-origin: initial !important;
    background-clip: initial !important;
    background-color: rgb(171, 206, 225) !important;
        
        ">Money Receipt</div>


<div class="row">
    
    <div class="col-6">

        <table class="table table-bordered">
      
            <tbody>
              <tr>
                <th scope="row">Voucher ID</th>
                <td>{{$voucher->id}}</td>
               
              </tr>
              <tr>
                <th scope="row">Voucher Ref</th>
                <td>{{$voucher->voucher_ref}}</td>
             
              </tr>
              <tr>
                <th scope="row">Payee to</th>
                <td>{{$voucher->pay_method}}</td>
             
              </tr>
            </tbody>
          </table>

    </div>

    <div class="col-6">
        <table class="table table-bordered">
      

            
            <tbody>
              <tr>
                <th scope="row">Transaction Mode/ Bill Ref</th>
                <td>{{$voucher->invoice_ref}}</td>
               
              </tr>
              <tr>
                <th scope="row">Date</th>
                <td>{{$voucher->transaction_date}}</td>
             
              </tr>
              <tr>
                <th scope="row">Payee to</th>
                <td>{{$voucher->pay_method}}</td>
             
              </tr>
            </tbody>
          </table>

    </div>

</div>





<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col" class="text-center">Particular</th>
        <th scope="col" class="text-center">Details</th>
        <th scope="col" class="text-center">Amount</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <th scope="row">Receive From</th>
        <td>{{$voucher->client_reg->guest_name}}</td>
        <td class="border-0" style="border: none !important;"></td>
   
      </tr>

      <tr>
        <th scope="row">Description</th>
        <td>{{$voucher->description}}</td>
        <td class="border-0" style="border: none !important;"></td>
      
      </tr>

      <tr>
        <th scope="row">Bank Name</th>
        <td>{{$voucher->bank_name}}</td>
        <td class="text-center" id="ammount_border_none" style="border: none !important;">{{number_format($voucher->ammount,2)}}</td>
        
      </tr>

      <tr>
        <th scope="row">Branch Name</th>
        <td>{{$voucher->branch}}</td>
        <td class="border-0" style="border: none !important;"></td>

       
      </tr>

      <tr>
        <th scope="row">Account No</th>
        <td>{{$voucher->account_no}}</td>
        <td class="border-0" style="border: none !important;"></td>

        
      </tr>

      <tr>
        <th scope="row">Cheque Issue Date</th>
        <td>{{$voucher->chequeissue_date}}</td>
        <td class="border-0" style="border: none !important;"></td>

      
      </tr>


    </tbody>
  </table>

</div>
</div>

<style>
    /* #ammount_border_none{
     border: none !important;

    } */
</style>

<script>
//     $(function() {
//   $("#voucher_invoice").find('.print').on('click', function() {
//     $.print("#voucher_invoice");
//   });

// });

    $(function() {
  $(".print").on('click', function() {
    $.print("#voucher_invoice");
  });

});

</script>

@endsection

@section('before_body')

@endsection