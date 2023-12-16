<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Room_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomCleanController extends Controller
{
           //room_clean 


           


    public function room_clean(){

     

        if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

         $infos = Room_info::where('which_branch', auth()->user()->branch)->latest()->paginate(20);

   
   
       }else{
         $infos = Room_info::latest()->paginate(20);
      
       }
        
        return view('backend.room_clean.index', compact('infos'));
     
         }
     
   

      //Goto Edit page room_clean 
      public function edit_room_clean($id){
     
     
         $info = Room_info::find($id);
     
     
         return view('backend.room_clean.edit', compact('info'));
         
      }
     
      //Update Slider room_clean 
      public function update_room_clean (Request $request, $id){
     
     $clean_sts = Room_info::find($id);
    

    
     
       $clean_sts->update([
    
        'last_clean' => $request->last_clean,
        'clean_sts' => $request->clean_sts
             
    ]);
     
              
    
         $this->successMessage('Updated success');
         return redirect()->back();
     
         
      }

      public function room_clean_filter(Request $request){

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
      
      
       
      
        return view('backend.room_clean.index', compact('infos'));
      }

 
}
