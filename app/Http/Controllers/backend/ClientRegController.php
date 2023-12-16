<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Client_reg;
use App\Models\Order_room;
use App\Models\Room_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ClientRegController extends Controller
{
           //reservation 
public function reservation(){

  
  if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  


    $infos = Client_reg::where('check_in_status', 'no')->where('which_branch', auth()->user()->branch)->latest()->paginate(20);


  }else{
    $infos = Client_reg::where('check_in_status', 'no')->latest()->paginate(20);

  }

 
    return view('backend.reservation.index', compact('infos'));
 
     }
 
 //Create reservation 
  public function create_reservation(){


    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  


  
      $room_infos = Room_info::where('room_sts', 'Free')->where('which_branch', auth()->user()->branch)->get();

  
    }else{
      $room_infos = Room_info::where('room_sts', 'Free')->get();
  
    }
      


     return view('backend.reservation.new', compact('room_infos'));
  }
 
  //Store reservation 
 
  public function store_reservation(Request $request){
 
     $validator = Validator::make($request->all(), [
         'contact'                => 'required|max:20',
         'guest'                => 'required|min:2',
         'email'                => 'min:2',
         'in'                => 'required|min:2',
         'out'                => 'required|min:2',
         'note'                => 'required|min:2',
        
         
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }


 
if($request->reference !== null && $request->reference !== ''){
    $reference = $request->reference;
}else{
    $reference = null;

}


$in =Carbon::parse($request->in)
->toDateTimeString();

$out =Carbon::parse($request->out)
->toDateTimeString();
 
  $client = Client_reg::create([
   
            'number'              => $request->contact,
            'guest_name'              => $request->guest,
            'ref_by'              => $reference,
            'email'              => $request->email,
            'arrival_date'              => $in,
            'departure_date'              => $out,
            'note'              => $request->note,
            'which_branch' => auth()->user()->branch
         
         ]);


  

         $input = $request->all();
         $input['room_ids'] = $request->input('room_ids');

         if ($input['room_ids'] !== null) {
          

          foreach($input['room_ids'] as $value){
          
            $client->order_rooms()->create([
    
                'room_info_id' => $value
            ]);


           $room_info = Room_info::find($value);

           $room_info->room_sts = 'Booked';
           $room_info->save();
         }


         
            
       
       
 
     $this->successMessage('Created success');
     return redirect()->back();


         }else{
           $this->errorMessage("Please select at least one room.");
           return redirect()->back()->withInput();
         }
            
      //    if (count($input['room_ids'])>2) {
         
      //     $client->order_rooms()->create([
    
      //       'room_info_id' => $input['room_ids']
      //   ]);

      //  $room_info = Room_info::find($input['room_ids']);

      //  $room_info->room_sts = 'Booked';
      //  $room_info->save();
      //    } 

   
 

 
  }
 
  //Goto Edit page reservation 
  public function edit_reservation($id){
 
 
     $info = Client_reg::find($id);

     if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

      $room_infos = Room_info::where('room_sts', 'Free')->where('which_branch', auth()->user()->branch)->get();



    }else{
      $room_infos = Room_info::where('room_sts', 'Free')->get();
   
    }
     


 
     return view('backend.reservation.edit', compact('info','room_infos'));
     
  }
 
  //Update Slider reservation 
  public function update_reservation(Request $request, $id){
 
 $management = Client_reg::find($id);

    $validator = Validator::make($request->all(), [

      'contact'                => 'required|max:20',
      'guest'                => 'required|min:2',
      'email'                => 'min:2',
      'in'                => 'required|min:2',
      'out'                => 'required|min:2',
      'note'                => 'required|min:2',

        
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }

     if($request->reference !== null && $request->reference !== ''){
      $reference = $request->reference;
  }else{
      $reference = null;
  
  }
 
  $in =Carbon::parse($request->in)
  ->toDateTimeString();
  
  $out =Carbon::parse($request->out)
  ->toDateTimeString();

   $management->update([

    'number'              => $request->contact,
    'guest_name'              => $request->guest,
    'ref_by'              => $reference,
    'email'              => $request->email,
    'arrival_date'              => $in,
    'departure_date'              => $out,
    'note'              => $request->note,
    
]);



$input = $request->all();
$input['room_ids'] = $request->input('room_ids');    

if ($input['room_ids'] !== null) {

  foreach($input['room_ids'] as $value){
          
    $management->order_rooms()->create([
  
        'room_info_id' => $value
    ]);
  
  
   $room_info = Room_info::find($value);
  
   $room_info->room_sts = 'Booked';
   $room_info->save();
  }
  
       $this->successMessage('Updated success');
       return redirect()->back();

}

foreach ($management->order_rooms as $order_room) {
 $order_room_id = $order_room->room_info_id;

  if ($input['room_ids'] === null && $order_room_id !==null ) {
    
//     $management->order_rooms()->update([
  
//       'room_info_id' => $order_room_id
//   ]);


//  $room_info = Room_info::find($order_room_id);

//  $room_info->room_sts = 'Booked';
//  $room_info->save();
  }
}




if($input['room_ids'] === null && $order_room_id === null){

  $this->errorMessage("Please select at least one room.");
           return redirect()->back()->withInput();
}

     $this->successMessage('Updated success');
     return redirect()->back();
 
 
 
  }
  //Delete reservation 
  public function delete_reservation($id){
 
    // if (auth()->user()->role_as !== 'creator'){


      $reservation = Client_reg::find($id);
  
 

      foreach ($reservation->order_rooms as $key => $order) {
       
        foreach ($order->room_infos as $key => $value) {

         $room_id = $value->id;

         Room_info::find($room_id)->update([

          'room_sts' => 'Free'

         ]);

        }
        
      }
      
      $reservation->delete();

      // $order_room->update([
      // 'room_sts' => "Free"
      // ]);

      $this->successMessage('Deleted success');
      return redirect()->back();
    // }

  }

  public function delete_room($id){


    $order_room = Order_room::find($id);
    
    foreach ($order_room->room_infos as $room) {
      $room->room_sts = 'Free';
      $room->save();
    }
    
    $order_room->delete();


    return redirect()->back();
  }

  public function reservation_list(){



    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

      $infos = Client_reg::where('check_in_status', 'no')->where('which_branch', auth()->user()->branch)->latest()->paginate(20);

  
  
    }else{
      $infos = Client_reg::where('check_in_status', 'no')->latest()->paginate(20);
  
    }



 
    return view('backend.reservation.list', compact('infos'));
  }

  public function reservation_filter(Request $request)
  {

    $start_date = Carbon::parse($request->start_date)
    ->toDateTimeString();

    $end_date = Carbon::parse($request->end_date)
    ->toDateTimeString();


    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

      $infos = Client_reg::where('check_in_status','no')->where('which_branch', auth()->user()->branch)->whereBetween('arrival_date', [$start_date, $end_date]) 
      ->paginate(20);
  
  
    }else{
      $infos = Client_reg::where('check_in_status','no')->whereBetween('arrival_date', [$start_date, $end_date]) 
      ->paginate(20);  
    }

    

 $title = 'Search Results';

    return view('backend.reservation.index' , compact('infos','title'));

  }


}
