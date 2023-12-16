<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\VoucherType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VoucherTypeController extends Controller
{
    
     //Trans Mode 
public function voucher_type(){

  if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  


    $infos = VoucherType::where('which_branch', auth()->user()->branch)->get();


  }else{
    $infos = VoucherType::all();  }


   
 
    
    return view('backend.voucher_type.index', compact('infos'));
 
     }
 
 //Create Trans Mode 
  public function create_voucher_type(){
      
     return view('backend.voucher_type.new');
  }
 
  //Store Trans Mode 
 
  public function store_voucher_type(Request $request){
 
     $validator = Validator::make($request->all(), [
         'voucher_type'                => 'required|min:2',
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 

 
     VoucherType::create([

            'voucher_type'              => $request->voucher_type,
            'which_branch' => auth()->user()->branch

         
         ]);
 
     $this->successMessage('Created success');
     return redirect()->back();
 

 
  }
 
  //Goto Edit page Trans Mode 
  public function edit_voucher_type($id){
 
 
     $info = VoucherType::find($id);
 
 
     return view('backend.voucher_type.edit', compact('info'));
     
  }
 
  //Update Slider Trans Mode 
  public function update_voucher_type(Request $request, $id){
 
 $management = VoucherType::find($id);

    $validator = Validator::make($request->all(), [

        'voucher_type'                => 'required|min:2',

        
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 
 
   $management->update([

    'voucher_type'              => $request->voucher_type,

         
]);
 
          

     $this->successMessage('Updated success');
     return redirect()->back();
 
     
 
 
  }
  //Delete Slider Trans Mode 
  public function delete_voucher_type($id){
 
    // if (auth()->user()->role_as !== 'creator'){

      $slider_img = VoucherType::find($id);
  
      $slider_img->delete();
      $this->successMessage('Deleted success');
      return redirect()->back();
    // }

  }
}
