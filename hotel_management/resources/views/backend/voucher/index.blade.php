


@extends('backend.layout.master')
@section('main_content')
    
<!-- DATE PICKER  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


<div style="padding: 3px 150px;">
    <div class="blockquote text-center mt-3 py-2 border rounded" style="
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
    
    ">Filter Option
    </div>



<form action="{{route('admin.voucher_filter')}}" method="POST">
@csrf

    


    <div class="form-row mt-4">
    
        <div class="col">
        <div class="mb-3">
        {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
        <input type="text" name="start_date" value="{{old('start_date')}}" id="start" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="From date">
        
        </div>
        </div>
        <div class="col">
        <div class="mb-3">
        {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
        <input type="text" name="end_date" value="{{old('end_date')}}" id="end" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="To date">
        
        </div>
        </div>
        
        
        </div>
    
    <div class="d-flex justify-content-center my-3">
    
    
    <button type="submit" class="btn btn-success w-50">Submit</button>

</form>

</div>



</div>


 <!-- table primary start -->
 <div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            {{--  <a href="{{route('admin.room.create')}}"> <div class="btn btn-success float-right mb-2">Create</div></a>  --}}

            <h4 class="header-title text-center">Active Voucher Manage</h4>
            <div class="single-table">
                <div class="table-responsive">
                <table class="table">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">

                          

                                <th scope="col">Id</th>
                                <th scope="col">Voucher For</th>
                                <th scope="col">Transaction Date</th>
                                <th scope="col">Voucher Reference</th>
                                <th scope="col">Voucher Type</th>
                                <th scope="col">Trans Mode</th>
                                <th scope="col">Branch/Cost center</th>
                                <th scope="col">Ammount</th>
                                <th scope="col">Invoice Reference</th>
                                <th scope="col">Status</th>
                                <th scope="col">Description</th>
                                
                                <th scope="col">Actions</th>

                           
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($infos as $info)
                              
                            <tr>
                               
                                <td>{{$info->id}}</td>
                                <td>
                                    {{$info->client_reg->guest_name}}
                                </td>  


                                <td class="font_sm">{{ \Carbon\Carbon::parse($info->transaction_date)->format('d/m/Y') }}</td>                  
                          
                                <td>{{$info->voucher_ref}}</td>                  
                                <td>{{$info->voucher_type}}</td>                  
                                <td>{{$info->trans_mode}}</td>                  
                                <td>{{$info->branch}}</td>   

                                <td>{{$info->ammount}}</td>
                                
                                <td>{{$info->invoice_ref}}</td> 
                                <td class="text-center">{{$info->status}}<a class="text-center" href="{{route('admin.voucher.change_sts', $info->id)}}"><i class="fas fa-exchange-alt d-block"></i></a></td> 
                                <td>{{$info->description}}</td> 
                                
                                                    


                                <td>
                                    <div class="d-flex align-items-center">

                                    <a  href="{{route('admin.voucher.invoice',$info->id)}}" class="mt-2 mr-3 btn btn-warning me-3 btn-sm"><i class="fas fa-print"></i></a>

                                    <a  href="{{route('admin.voucher.edit', $info->id)}}" class="mt-2 mr-3 btn btn-warning me-3 btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                 
                                    @if (auth()->user()->role_as !== 'creator')
                                    <form class="d-inline " onclick="return confirm('Sure to delete product ?')"  action="{{route('admin.voucher.delete', $info->id)}}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-danger mt-2 btn-sm"><i class="ti-trash"></i></button>
                                        </form>
                                    @endif
                                    </div>
                                </td>


                            </tr>

                            @endforeach
                   
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center py-3"> {{$infos->links()}}</div>

    </div>
</div>
<!-- table primary end -->


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