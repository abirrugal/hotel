


@extends('backend.layout.master')
@section('main_content')
    

 <!-- table primary start -->
 <div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <a href="{{route('admin.reservation.create')}}"> <div class="btn btn-success float-right mb-2">Create</div></a>

            <h4 class="header-title text-center">Reservation List</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">

                          

                                <th scope="col">Phone No</th>
                                <th scope="col">Refferenced By</th>
                                <th scope="col">Guest Name</th>
                                <th scope="col">Reserved Room</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Email</th>
                                <th scope="col">Check-in</th>
                                <th scope="col">Check-out</th>
                                <th scope="col">Note</th>
                               

                                

                           
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($infos as $info)
                              
                            <tr>
                               

                                <td class="font_sm">{{$info->number}}</td>                  
                                <td class="font_sm">{{$info->ref_by}}</td>                  
                                <td class="font_sm">{{$info->guest_name}}</td>                  
                                <td class="font_sm">{{$info->order_rooms->count()}}</td>   
                                <td class="font_sm">
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($info->order_rooms as $order_room)
                                    @foreach ($order_room->room_infos as $room)
                                        @php
                                            $total = $total + $room->room_rate;
                                        @endphp
                                    @endforeach
                                    @endforeach
                                     {{number_format($total,2)}} 
                                 
                                 </td>               
                                <td class="font_sm">{{$info->email}}</td> 

                                <td class="font_sm">{{ \Carbon\Carbon::parse($info->arrival_date)->format('d/m/Y') }}</td>                  
                                <td class="font_sm">{{ \Carbon\Carbon::parse($info->departure_date)->format('d/m/Y') }}</td>                  
                            

                                <td class="font_sm">{{$info->note}}</td>                  



      

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