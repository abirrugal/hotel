
@extends('backend.layout.master')
@section('main_content')

<div class="container p-5">
<div class="blockquote text-center my-3">{{$client->guest_name}}</div>

<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
 Number
      <span class="">{{$client->number}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
  Guest Quantity
      <span class="">{{$client->pax}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
  Reserved Room
      <span class="">
          @foreach ($client->order_rooms as $order_rooms)
          @foreach ($order_rooms->room_infos as $room)
              
          @endforeach
              {{$room->room_no}} ,
          @endforeach
          {{-- {{$client->order_rooms->count()}} --}}
        </span>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center">
        Arrival date
      <span class="">{{$client->arrival_date}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Departure date
      <span class="">{{$client->departure_date}}</span>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center">
        Pay Ammout


      <span class="">

        @if(isset($client->vouchers)) 
        @foreach ($client->vouchers as $voucher)
            {{$voucher->ammount}} {{$voucher->status}}
        @endforeach
        @else

        No Voucher Created Yet.
        @endif
      

      </span>
    </li>


    <li class="list-group-item d-flex justify-content-between align-items-center">
    Special Note
      <span class="">{{$client->note}}</span>
    </li>
  
  </ul>
</div>
@endsection