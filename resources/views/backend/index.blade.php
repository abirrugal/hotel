@extends('backend.layout.master')

@section('main_content')
   
  
<h5 class="card-title text-center my-2 border p-3 ">Dashboard Overview</h5>
<div class="d-flex justify-content-center">

<div class="d-flex flex-row flex-wrap justify-content-center mt-3">

<div class="card my-2 mx-2" style="width: 27rem;">
    <div class="card-body bg-success text-white">
      <h5 class="card-title text-center">Today's Collections</h5>
     
    

      <div class="col-lg-12 d-flex justify-content-center ">
    
        <div class="single-table">
            <div style="table-responsive">
            <table class="table">
                    <thead class="text-uppercase ">
                        <tr class="text-white">

                            <th scope="col">Room</th>
                            <th scope="col">Ammount</th>
                          
                   

                       
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($today_collections as $info)
                          
                        <tr>
                           

                            <td>

            
                    @foreach ($info->client_reg->order_rooms as $order_room)
                        @foreach ($order_room->room_infos as $room)
                            {{$room->room_no}} ,
                        @endforeach
                    @endforeach
              


                            </td> 
                            
                            
                            <td>{{$info->ammount}}</td>                  
                                          
                                   
                        </tr>

                        @endforeach
               
                        
                    </tbody>
                </table>
            </div>
        </div>
    <div class="d-flex justify-content-center py-3"> {{$today_collections->links()}}</div>

</div>

    </div>
  </div>


<div class="card my-2 mx-2 " style="width: 27rem;">
    <div class="card-body px-0 bg-primary text-white">
      <h5 class="card-title text-center ">Today's Expenses</h5>
      {{--  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>  --}}

      <div class="col-lg-12 d-flex justify-content-center ">
    
        <div class="single-table">
            <div style="table-responsive">
            <table class="table">
                    <thead class="text-uppercase ">
                        <tr class="text-white">

                            <th scope="col">Reason</th>
                            <th scope="col">Amount</th>
                          
                   

                       
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($today_expenses as $info)
                          
                        <tr>
                           

                            <td>{{$info->reson}}</td>                  
                            <td>{{$info->amount}}</td>                  
                                          
                                   
                        </tr>

                        @endforeach
               
                        
                    </tbody>
                </table>
            </div>
        </div>
    <div class="d-flex justify-content-center py-3"> {{$today_expenses->links()}}</div>

</div>

    </div>
  </div>


<div class="card my-2 mx-2" style="width: 27rem;">
    <div class="card-body bg-info text-white">
      <h5 class="card-title text-center ">Free Room For Today</h5>
      {{--  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>  --}}


      <div class="col-lg-12 d-flex justify-content-center ">
    
                <div class="single-table">
                    <div style="table-responsive">
                    <table class="table">
                            <thead class="text-uppercase ">
                                <tr class="text-white">
    
                                    <th scope="col">Room</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Floor</th>
                           
   
                               
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($today_free_room as $info)
                                  
                                <tr>
                                   
    
                                    <td>{{$info->room_no}}</td>                  
                                    <td>{{$info->room_category}}</td>                  
                                                  
                                    <td>{{$info->floor_no}}</td>                  
                         
    
    

                                </tr>
    
                                @endforeach
                       
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="d-flex justify-content-center py-3"> {{$today_free_room->links()}}</div>
    
    </div>

     
    </div>
  </div>



<div class="card my-2 mx-2" style="width: 27rem;">
    <div class="card-body bg-dark text-white">
      <h5 class="card-title text-center ">Monthly Expenses</h5>
      
      <div class="col-lg-12 d-flex justify-content-center ">
    
        <div class="single-table">
            <div style="table-responsive">
            <table class="table">
                    <thead class="text-uppercase ">
                        <tr class="text-white">

                            <th scope="col">Reason</th>
                            <th scope="col">Amount</th>
                          
                   

                       
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($monthly_expenses as $info)
                          
                        <tr>
                           

                            <td>{{$info->reson}}</td>                  
                            <td>{{$info->amount}}</td>                  
                                          
                                   
                        </tr>

                        @endforeach
               
                        <tr>
                          Total Monthly Expense:  {{$total_monthly_expense}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <div class="d-flex justify-content-center py-3"> {{$monthly_expenses->links()}}</div>

</div>
     
    </div>
  </div>



<div class="card my-2 mx-2" style="width: 27rem;">
    <div class="card-body bg-info text-white">
      <h5 class="card-title text-center ">Today Reservation</h5>
      {{--  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>  --}}

      
      <div class="col-lg-12 d-flex justify-content-center ">
    
        <div class="single-table">
            <div style="table-responsive">
            <table class="table">
                    <thead class="text-uppercase ">
                        <tr class="text-white">

                           
                            <th scope="col">Name</th>
                        
                            <th scope="col">Total Reserved Room</th>
                   

                       
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($reservations as $info)
                          
                        <tr>
                           

                            <td>{{$info->guest_name}}</td>                  
                                      
                            <td class="font_sm text-center">{{$info->order_rooms->count()}}</td>             
                                  
                 



                        </tr>

                        @endforeach
               <tr>
                   Total Reservations  : {{"  ".$reservations->count()}}
               </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    <div class="d-flex justify-content-center py-3"> {{$reservations->links()}}</div>

</div>

    </div>
  </div>

<div class="card my-2 mx-2" style="width: 27rem;">
    <div class="card-body bg-success text-white">
      <h5 class="card-title text-center ">Today Check In</h5>
      {{--  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>  --}}
     

      
      <div class="col-lg-12 d-flex justify-content-center ">
    
        <div class="single-table">
            <div style="table-responsive">
            <table class="table">
                    <thead class="text-uppercase ">
                        <tr class="text-white">

                           
                            <th scope="col">Name</th>
                        
                            <th scope="col">Total Reserved Room</th>
                   

                       
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($check_ins as $info)
                          
                        <tr>
                           

                            <td>{{$info->guest_name}}</td>                  
                                      
                            <td class="font_sm text-center">{{$info->order_rooms->count()}}</td>             
                                  
                 



                        </tr>

                        @endforeach
               <tr>
                   Total Check In  : {{"  ".$check_ins->count()}}
               </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    <div class="d-flex justify-content-center py-3"> {{$check_ins->links()}}</div>

</div>
     
    </div>
  </div>







</div>

</div>

@endsection
