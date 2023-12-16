


@extends('backend.layout.master')
@section('main_content')
    

 <!-- table primary start -->
 <div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <a href="{{route('admin.room.create')}}"> <div class="btn btn-success float-right mb-2">Create Room.</div></a>

            <h4 class="header-title text-center">All Room Information</h4>
            <div class="single-table">
                <div style="table-responsive">
                <table class="table">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">

                          

                                <th scope="col">Room Id</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Room No</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Floor</th>
                                <th scope="col">Services</th>
                                <th scope="col">Type</th>
                                <th scope="col">Guest</th>
                                <th scope="col">Rate</th>
                                

                           
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($infos as $info)
                              
                            <tr>
                               

                                <td>{{$info->id}}</td>                  
                                <td>{{$info->room_sts}}</td>                  
                                <td>{{$info->room_no}}</td>                  
                                <td>{{$info->room_category}}</td>                  
                                <td>{{$info->status}}</td>                  
                                <td>{{$info->floor_no}}</td>                  
                                <td>{{$info->service}}</td>
                                <td>{{$info->product_name}}</td> 
                                
                                <td>  

                              @if(isset($info->order_room->client_reg->guest_name))
                                {{$info->order_room->client_reg->guest_name}}  
                              @else
                              ---
                              @endif
                                </td>                               

                                <td>{{number_format($info->room_rate,2)}}</td>                  



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