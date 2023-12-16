


@extends('backend.layout.master')
@section('main_content')
    

 <!-- table primary start -->
 <div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            {{--  <a href="{{route('admin.room.create')}}"> <div class="btn btn-success float-right mb-2">Create</div></a>  --}}

            <h4 class="header-title text-center">Voucher List</h4>
            <div class="single-table">
                <div class="table-responsive">
                <table class="table">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">

                          

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
                               

                                <td>
                                    {{$info->client_reg->guest_name}}
                                </td>  

                                <td>{{$info->transaction_date}}</td>                  
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


@endsection