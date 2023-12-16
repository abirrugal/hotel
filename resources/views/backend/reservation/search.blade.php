
@extends('backend.layout.master')
@section('main_content')

<!-- DATE PICKER  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
<div class="px-10">
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

<form action="{{route('admin.reservation_filter')}}" method="POST">
@csrf


<div class="form-row mt-4">
    <div class="col">
    <div class="mb-3">
    {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
    <input type="text" name="guest"  class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Guest Name">
    
    </div>
    </div>
    </div>
    
    <div class="form-row mt-4">
    
    <div class="col">
    <div class="mb-3">
    {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
    <input type="text" name="start_date" id="start" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Exp: Check-In Date">
    
    </div>
    </div>
    <div class="col">
    <div class="mb-3">
    {{--  <label for="name" class="form-label text-black h6">Guest Name</label>  --}}
    <input type="text" name="end_date" id="end" class="form-control" id="slider_image" aria-describedby="PriceHelp" placeholder="Exp: Check-Out Date">
    
    </div>
    </div>
    
    
    </div>
    
    <div class="d-flex justify-content-center my-3">
    
    
    <button type="submit" class="btn btn-success w-50">Submit</button>

</form>

</div>



</div>



@isset($title)
    {{$title}}
@endisset

 <!-- table primary start -->
 <div class="col-lg-12 mt-4">
    <div class="card">
        <div class="card-body">


            <a href="{{route('admin.reservation.create')}}"> <div class="btn btn-success float-right mb-2">Create</div></a>

            <h4 class="header-title text-center">Reservation Manage</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">

                          

                                <th scope="col">Id</th>
                                <th scope="col">Phone No</th>
                                <th scope="col">Refferenced By</th>
                                <th scope="col">Guest Name</th>
                                <th scope="col">Reserved Room</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Email</th>
                                <th scope="col">Check-in</th>
                                <th scope="col">Check-out</th>
                                <th scope="col">Note</th>
                               

                                <th scope="col">Actions</th>

                           
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($s_infos as $info)
                              
                            <tr>
                               

                                <td class="font_sm">{{$info->id}}</td>                  
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
                                <td class="font_sm">{{$info->arrival_date}}</td>                  
                                <td class="font_sm">{{$info->departure_date}}</td>                  
                                <td class="font_sm">{{$info->note}}</td>                  



                



                                <td>
                                    <div class="d-flex align-items-center">

                    

                                 <a class="mt-2 mr-3 btn btn-success me-3 btn-sm" href="{{route('admin.check_in.con', $info->id)}}"><i class="far fa-check-circle"></i> Check-in</a>
                                 <a class="mt-2 mr-3 btn btn-success me-3 btn-sm" href="{{route('admin.voucher.create', $info->id)}}"><i class="far fa-check-circle"></i> Add Voucher</a>

                                    

                                    <a  href="{{route('admin.reservation.edit', $info->id)}}" class="mt-2 mr-3 btn btn-warning me-3 btn-sm"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                 
                                    @if (auth()->user()->role_as !== 'creator')
                                    <form class="d-inline " onclick="return confirm('Sure to delete product ?')"  action="{{route('admin.reservation.delete', $info->id)}}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-danger mt-2 btn-sm"><i class="ti-trash"></i> Delete</button>
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

        {{--  <div class="d-flex justify-content-center py-3"> {{$s_infos->links()}}</div>  --}}

    </div>
</div>
<!-- table primary end -->

<style>
    .px-10{
    padding: 3px 150px;
}
</style>

<script type="text/javascript">
  
    $('#start').datepicker({
        uiLibrary: 'bootstrap4'
    });
  
    $('#end').datepicker({
        uiLibrary: 'bootstrap4'
    });
  
    </script>
@endsection