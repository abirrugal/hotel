<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\TransMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransModeController extends Controller
{
    
      //Trans Mode 
public function trans_mode(){

  if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

    $infos = TransMode::where('which_branch', auth()->user()->branch)->get();




  }else{
    $infos = TransMode::all(); 
  }
  
  
 
    
    return view('backend.trans_mode.index', compact('infos'));
 
     }
 
 //Create Trans Mode 
  public function create_trans_mode(){
      
     return view('backend.trans_mode.new');
  }
 
  //Store Trans Mode 
 
  public function store_trans_mode(Request $request){
 
     $validator = Validator::make($request->all(), [
         'trans_mode'                => 'required|min:2',
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 

 
     TransMode::create([

            'trans_mode'              => $request->trans_mode,
            'which_branch' => auth()->user()->branch

         
         ]);
 
     $this->successMessage('Created success');
     return redirect()->back();
 

 
  }
 
  //Goto Edit page Trans Mode 
  public function edit_trans_mode($id){
 
 
     $info = TransMode::find($id);
 
 
     return view('backend.trans_mode.edit', compact('info'));
     
  }
 
  //Update Slider Trans Mode 
  public function update_trans_mode(Request $request, $id){
 
 $management = TransMode::find($id);

    $validator = Validator::make($request->all(), [

        'trans_mode'                => 'required|min:2',

        
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 
 
   $management->update([

    'trans_mode'              => $request->trans_mode,

         
]);
 
          

     $this->successMessage('Updated success');
     return redirect()->back();
 
     
 
 
  }
  //Delete Slider Trans Mode 
  public function delete_trans_mode($id){
 
    // if (auth()->user()->role_as !== 'creator'){

      $slider_img = TransMode::find($id);
  
      $slider_img->delete();
      $this->successMessage('Deleted success');
      return redirect()->back();
    // }

  }
}
