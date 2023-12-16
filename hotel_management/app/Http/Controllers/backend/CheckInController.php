<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Client_reg;
use App\Models\Room_info;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CheckInController extends Controller
{
    //check_in 
public function check_in(){

  if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

    $infos = Client_reg::where('check_in_status', 'yes')->where('which_branch', auth()->user()->branch)->latest()->paginate(20);


  }else{
    $infos = Client_reg::where('check_in_status', 'yes')->latest()->paginate(20);
 
  }

 
    return view('backend.check_in.index', compact('infos'));
 
     }

     public function check_out_list(){

      if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

    
        $infos = Client_reg::where('check_in_status', 'out')->where('which_branch', auth()->user()->branch)->latest()->paginate(20);


      }else{
        $infos = Client_reg::where('check_in_status', 'out')->latest()->paginate(20);
     
      }


      return view('backend.check_in.check_out', compact('infos'));
     }
 
 //Create check_in 
  public function create_check_in(){
      
    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

      $room_infos = Room_info::where('room_sts', 'Free')->where('which_branch', auth()->user()->branch)->get();



    }else{
      $room_infos = Room_info::where('room_sts', 'Free')->get();
   
    }


    
     return view('backend.check_in.new', compact('room_infos'));
  }
 
  //Store check_in 
 
  public function store_check_in(Request $request){
 
     $validator = Validator::make($request->all(), [

      'contact'                => 'required|max:20',
      'guest'                => 'required|min:2',
      'in'                => 'required|min:2',
      'out'                => 'required|min:2',
      'note'                => 'required|min:2',
      'age'                => 'required|min:2',
      'birth'                => 'required|min:2',
      'gender'                => 'required|min:2',
      'profession'                => 'required|min:2',
      'pax'                => 'required',
      'present'                => 'required|min:2',
      'permanent'                => 'required|min:2',
      'country'                => 'required|min:2',
      'purpose'                => 'required|min:2',
      'method'                => 'required|min:2',
         
        
         
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
            'present_address'              => $request->present,
            'permanent_address'              => $request->permanent,
            'country'              => $request->country,
            'nid'              => $request->nid,
            'passport'              => $request->passport,
            'visit_purpose'              => $request->purpose,
            'coming_from'              => $request->from,
            'next_destination'              => $request->next,
            'age'              => $request->age,
            'birth_date'              => $request->birth,
            'gender'              => $request->gender,
            'profession'              => $request->profession,
            'pax'              => $request->pax,
            'payment_method'              => $request->method,
            'check_in_status'              => 'yes',
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


 
  }
 
  //Goto Edit page check_in 
  public function edit_check_in($id){
 
 
     $info = Client_reg::find($id);


     if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  



      $room_infos = Room_info::where('room_sts', 'Free')->where('which_branch', auth()->user()->branch)->get();



    }else{
      $room_infos = Room_info::where('room_sts', 'Free')->get();
   
    }


    $title = 'Check-In Edit';
 
     return view('backend.check_in.edit', compact('info','room_infos','title'));
     
  }
 
  //Update Slider check_in 
  public function update_check_in(Request $request, $id){
 
 $management = Client_reg::find($id);

    $validator = Validator::make($request->all(), [

      'contact'                => 'required|max:20',
      'guest'                => 'required|min:2',
      'in'                => 'required|min:2',
      'out'                => 'required|min:2',
      'note'                => 'required|min:2',
      'age'                => 'required|min:2',
      'birth'                => 'required|min:2',
      'gender'                => 'required|min:2',
      'profession'                => 'required|min:2',
      'pax'                => 'required',
      'present'                => 'required|min:2',
      'permanent'                => 'required|min:2',
      'country'                => 'required|min:2',
      'purpose'                => 'required|min:2',
      'pay_method'                => 'required|min:2',
      
        
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
            'present_address'              => $request->present,
            'permanent_address'              => $request->permanent,
            'country'              => $request->country,
            'nid'              => $request->nid,
            'passport'              => $request->passport,
            'visit_purpose'              => $request->purpose,
            'coming_from'              => $request->from,
            'next_destination'              => $request->next,
            'age'              => $request->age,
            'birth_date'              => $request->birth,
            'gender'              => $request->gender,
            'profession'              => $request->profession,
            'pax'              => $request->pax,
            'payment_method'              => $request->method,
            'check_in_status'              => 'yes',

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
       return redirect()->route('admin.check_in');

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
  //Delete check_in 
  public function delete_check_in($id){
 
   

      $check_in = Client_reg::find($id);
  

      if ($check_in->check_in_status !== 'out'){


        foreach ($check_in->order_rooms as $key => $order) {
       
          foreach ($order->room_infos as $key => $value) {
  
           $room_id = $value->id;
  
           Room_info::find($room_id)->update([
  
            'room_sts' => 'Free'
  
           ]);
  
          }
          
        }
        
        $check_in->delete();
  
        // $order_room->update([
        // 'room_sts' => "Free"
        // ]);
  
        $this->successMessage('Deleted success');
        return redirect()->back();


      }else{
        $this->errorMessage('Permission denied.');
        return redirect()->back();

      }
      


    

  }


  public function con_check_in($id){

    $info = Client_reg::find($id);

    
    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

      $room_infos = Room_info::where('room_sts', 'Free')->where('which_branch', auth()->user()->branch)->get();



    }else{
      $room_infos = Room_info::where('room_sts', 'Free')->get();
   
    }

   $title = 'Check-In Add';

    return view('backend.check_in.edit', compact('info','room_infos','title'));
    
  }


  public function check_out($id){

    $check_out = Client_reg::find($id);


    $check_out->check_in_status = "out";
    $check_out->save();

    foreach ($check_out->order_rooms as $order_room) {
      foreach ($order_room->room_infos as  $room) {
        $room->room_sts = "Free";
        $room->save();

      }
    }

    foreach ($check_out->order_rooms as $order_room) {
      $order_room->delete();
    }

    
    $this->successMessage('Checked Out Success');
      return redirect()->back();
  }

  public function guest_info($id){

    $client = Client_reg::find($id);

  
    return view('backend.check_in.guest_info', compact('client'));
  }

  public function check_in_list(){


    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
      $infos = Client_reg::where('check_in_status', 'yes')->where('which_branch', auth()->user()->branch)->latest()->paginate(20);




    }else{
      $infos = Client_reg::where('check_in_status', 'yes')->latest()->paginate(20);
   
    }

 
    return view('backend.check_in.list', compact('infos'));
    
  }

  public function check_in_filter(Request $request)
  {


     $start_date = Carbon::parse($request->start_date)
                           ->toDateTimeString();

     $end_date = Carbon::parse($request->end_date)
                           ->toDateTimeString();
    $name = $request->name;


    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
      $infos =  Client_reg::where('check_in_status','yes')->where('which_branch', auth()->user()->branch)->whereBetween('arrival_date', [$start_date,$end_date])->paginate(20);


    }else{
      $infos =  Client_reg::where('check_in_status','yes')->whereBetween('arrival_date', [$start_date,$end_date])->paginate(20);
   
    }



 $title = 'Search Results';
 return view('backend.check_in.index' , compact('infos','title'));



  }



  public function check_out_filter(Request $request)
  {


     $start_date = Carbon::parse($request->start_date)
                           ->toDateTimeString();

     $end_date = Carbon::parse($request->end_date)
                           ->toDateTimeString();
    $name = $request->name;


    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
      $infos =  Client_reg::where('check_in_status','out')->where('which_branch', auth()->user()->branch)->whereBetween('arrival_date', [$start_date,$end_date])->paginate(20);


    }else{
      $infos =  Client_reg::where('check_in_status','out')->whereBetween('arrival_date', [$start_date,$end_date])->paginate(20);
   
    }



 $title = 'Search Results';
 return view('backend.check_in.check_out' , compact('infos','title'));



  }

  public function delete_check_out($id){
    $check_out = Client_reg::find($id);
    $check_out->delete();
  }
}
