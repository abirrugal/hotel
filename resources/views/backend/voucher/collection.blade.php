@extends('backend.layout.master')
@section('main_content')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="px-5 mt-5">
    <div class="container">
    <button class=" print btn btn-info d-flex justify-content-end">Print</button>
    </div>
    </div>

  
<!-- DATE PICKER  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  


<div class="px-10">

  <form action="{{route('admin.collect_filter')}}" method="POST">
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


<div id="voucher_invoice">

<div class="px-5">
<div class="container">
    
    
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
    
    ">Room wise Collection Deatail</div>


<div class="single-table">
    <div class="table-responsive">
        <table class="table">
            <thead class="text-uppercase bg-primary" style="
            background-image: initial !important;
        background-position-x: initial !important;
        background-position-y: initial !important;
        background-size: initial !important;
        background-repeat-x: initial !important;
        background-repeat-y: initial !important;
        background-attachment: initial !important;
        background-origin: initial !important;
        background-clip: initial !important;
        background-color: rgb(171, 206, 225) !important;">
                <tr class="text-white">
      
                    <th class="text-dark" scope="col">Id</th>
                    <th class="text-dark" scope="col">Name</th>                  
                    <th class="text-dark" scope="col">Payment Method</th>
                    <th class="text-dark" scope="col">Ammount</th>          
                    </div>
               
                </tr>
            </thead>
            <tbody>
                

                @foreach ($vouchers as $allvoucher)                    
                <tr>
                   
                    <td>{{$allvoucher->id}}</td>  
                    <td>{{$allvoucher->name}}</td> 
                    <td>{{$allvoucher->pay_method}}</td> 
                    <td>{{number_format($allvoucher->ammount,2)}}</td> 
   
                

                </tr>

                @endforeach

             

            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>


{{-- @endforeach --}}
<div class="d-flex justify-content-end my-3 pr-3 font-weight-bolder">
    Total : {{$total}}
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


  