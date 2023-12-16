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
        
        ">Total Balance Sheet</div>


<div id="voucher_invoice">
  <div class="container px-5">

    
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" class="text-center">Total Collection</th>
      <th scope="col" class="text-center">Total Expense</th>
      <th scope="col" class="text-center">Total Assets</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td>BDT {{number_format($total_collection,2)}} </td>
      <td>BDT {{number_format($total_expense,2)}} </td>
      <td>BDT {{number_format($total_collection - $total_expense,2)}} </td>
 
    </tr>





  </tbody>
</table>

</div>
</div>


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