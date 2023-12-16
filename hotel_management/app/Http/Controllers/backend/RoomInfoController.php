<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Room_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomInfoController extends Controller
{
       //room 
public function room(){

  if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
    $infos = Room_info::where('which_branch', auth()->user()->branch)->latest()->paginate(20);
  }else{
    $infos = Room_info::latest()->paginate(20);
  }
    
 
    
    return view('backend.room_info.index', compact('infos'));
 
     }

public function free_room(){

  if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
    $infos = Room_info::where('room_sts','Free')->where('which_branch', auth()->user()->branch)->latest()->paginate(20);

  }else{
    $infos = Room_info::where('room_sts','Free')->latest()->paginate(20);
  }

 
    
    return view('backend.room_info.free_room', compact('infos'));
 
     }
 
 //Create room 
  public function create_room(){
      
     return view('backend.room_info.new');
  }
 
  //Store room 
 
  public function store_room(Request $request){
 
     $validator = Validator::make($request->all(), [
         'room_no'                => 'required|min:2',
         'category'                => 'required|min:2',
         'floor'                => 'required|min:2',
         'services'                => 'min:2',
         'product'                => 'required|min:2',
         'rate'                => 'required|min:2',
         'status'                => 'required|min:2',
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 



 
   Room_info::create([

            'room_no'              => $request->room_no,
            'room_category'              => $request->category,
            'floor_no'              => $request->floor,
            'service'              => $request->services,
            'product_name'              => $request->product,
            'room_rate'              => $request->rate,
            'status'              => $request->status,
            'which_branch' => auth()->user()->branch
         ]);
 
     $this->successMessage('Created success');
     return redirect()->back();
 

 
  }
 
  //Goto Edit page room 
  public function edit_room($id){
 
 
     $info = Room_info::find($id);
 
 
     return view('backend.room_info.edit', compact('info'));
     
  }
 
  //Update Slider room 
  public function update_room(Request $request, $id){
 
 $management = Room_info::find($id);

    $validator = Validator::make($request->all(), [

      'room_no'                => 'required|min:2',
      'category'                => 'required|min:2',
      'floor'                => 'required|min:2',
      'services'                => 'min:2',
      'product'                => 'required|min:2',
      'rate'                => 'required|min:2',
      'status'                => 'required|min:2',
        
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 
 
   $management->update([

    'room_no'              => $request->room_no,
    'room_category'              => $request->category,
    'floor_no'              => $request->floor,
    'service'              => $request->services,
    'product_name'              => $request->product,
    'room_rate'              => $request->rate,
    'status'              => $request->status,
         
]);
 
          

     $this->successMessage('Updated success');
     return redirect()->back();
 
     
 
 
  }
  //Delete Slider room 
  public function delete_room($id){
 
    // if (auth()->user()->role_as !== 'creator'){

      $slider_img = Room_info::find($id);
  
      $slider_img->delete();
      $this->successMessage('Deleted success');
      return redirect()->back();
    // }

  }

  public function room_info(){


    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
      $infos = Room_info::where('room_sts','Free')->where('which_branch', auth()->user()->branch)->latest()->paginate(20);
  
    }else{
      $infos = Room_info::where('room_sts','Free')->latest()->paginate(20);
    }

    $infos = Room_info::latest()->paginate(20);
    return view('backend.allroom_info.allroom_info', compact('infos'));
  }

  public function room_list(){

    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
      $infos = Room_info::where('which_branch', auth()->user()->branch)->latest()->paginate(20);


    }else{
      $infos = Room_info::latest()->paginate(20);
    }



 
    
    return view('backend.room_info.list', compact('infos'));
  }

public function room_info_filter(Request $request){

  $room_no = $request->room_no;
  $room_id = $request->id;
  

    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

      $infos = Room_info::query()->where('which_branch', auth()->user()->branch)
      ->where('room_no', $room_no) 
      ->orWhere('id', $room_id) 
      ->paginate(20);


    }else{
      $infos = Room_info::query()
      ->where('room_no', $room_no) 
      ->orWhere('id', $room_id) 
      ->paginate(20);
    }


 

  return view('backend.room_info.index', compact('infos'));
}



public function free_room_info_filter(Request $request){

  $room_no = $request->room_no;
  $room_id = $request->id;
  

    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

      $infos = Room_info::query()->where('room_sts','free')->where('which_branch', auth()->user()->branch)
      ->where('room_no', $room_no) 
      ->orWhere('id', $room_id) 
      ->paginate(20);


    }else{
      $infos = Room_info::query()->where('room_sts','free')
      ->where('room_no', $room_no) 
      ->orWhere('id', $room_id) 
      ->paginate(20);
    }


 

  return view('backend.room_info.free_room', compact('infos'));
}

}
