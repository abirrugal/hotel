@extends('backend.layout.master')
@section('main_content')


<!-- DATE PICKER  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  


<div class="px-10">

  <form action="{{route('admin.balance.sheet.filter')}}" method="POST">
  @csrf
  
      
  
      <div class="form-row mt-4">
      
      <div class="col">
      <div class="mb-3">
      {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
      <input type="text" name="start_date" value="{{old('start_date')}}" id="start" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Exp: Check-In Date">
      
      </div>
      </div>
      <div class="col">
      <div class="mb-3">
      {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
      <input type="text" name="end_date" value="{{old('end_date')}}" id="end" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Exp: Check-Out Date">
      
      </div>
      </div>
      
      
      </div>
      
      <div class="d-flex justify-content-center my-3">
      
      
      <button type="submit" class="btn btn-success w-50">Submit</button>
  
  </form>
  
  </div>
  
  
  
  </div>


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
        
        ">Balance Sheet</div>


<div id="voucher_invoice">
  <div class="container px-5">

    
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" class="text-center">Collections</th>
      <th scope="col" class="text-center">Expenses</th>
      <th scope="col" class="text-center">Total Assets</th>
    </tr>
  </thead>
  <tbody>

    <tr>
       
      <td>
        @foreach ($collections as $collection)
         <div class="d-flex justify-content-between">
           <div> {{$collection->name}}</div>
            
           <div> BDT {{number_format($collection->ammount,2)}}</div>
         </div>
         @endforeach   

        
       </td>

 


    
    <td>
        @foreach ($expenses as $expense)
       <div class="d-flex justify-content-between">
         <div> {{$expense->reson}}</div>
          
         <div> BDT {{number_format($expense->amount,2)}}</div>
       </div>
       @endforeach    


  
  </td>

 <td>
    <div class="d-flex justify-content-center align-items-center">

    <div>BDT {{number_format($total_collection - $total_expense,2)}}</div>
    </div>
 </td>



      {{--  <td>BDT {{number_format($total_expense,2)}} </td>
      <td>BDT {{number_format($total_collection - $total_expense,2)}} </td>  --}}
 
    </tr>

<tr>

    <td>          
        <div class="d-flex justify-content-between">
        <div>Total Collection</div>
         
        <div> BDT {{number_format($total_collection,2)}}</div>
      </div>
    </td>

    <td>

        <div class="d-flex justify-content-between">
            <div>Total Expense</div>
             
            <div> BDT {{number_format($total_expense,2)}}</div>
          </div>
    </td>

    <td>

   
    </td>


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


<style>
  .px-10{
  padding: 3px 150px;
}
</style>

<script type="text/javascript">

  $('#start').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'dd mmm yyyy' 
  });

  $('#end').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'dd mmm yyyy' 
  });

  </script>
@endsection