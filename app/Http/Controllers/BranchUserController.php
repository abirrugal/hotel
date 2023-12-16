<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class BranchUserController extends Controller
{
   public function branch_user_create(){
    return view('backend.auth.branch_control.new');

   }

   public function branch_user_store(Request $request){
  
    if(auth()->user()->role_as === 'branch'){


        $validator = Validator::make($request->all(), [
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed'
            
        ]);
    
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput()->withInput();
        }
    
    
        $image_file = $request->file('image');
    
        if($image_file){
     
         $img_gen = hexdec(uniqid());
         $image_url = 'auth/profile_img/';
         $image_ext = strtolower($image_file->getClientOriginalExtension());
     
     
         $img_name = $img_gen.'.'.$image_ext;
         $final_name1 = $image_url.$img_gen.'.'.$image_ext;
     
         $image_file->move($image_url, $img_name);
    
     
        }
    
    
     User::create([
            'image' => $final_name1,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => 'creator',
            'branch' => auth()->user()->name
        ]);
    
    
            $this->successMessage('Registration successfull');
    
    
            return redirect()->back();
    }
   }

   public function user_list(){

    $slider_images =  User::where('role_as','creator')->where('branch', auth()->user()->name)->paginate(20);
  
    return view('backend.auth.branch_control.index' , compact('slider_images'));

   }

   public function delete_user($id){
    if(auth()->user()->role_as === 'branch'){
  
        $slider_img = User::find($id);
    
  if($slider_img->image){

      unlink($slider_img->image);
  }
        $slider_img->delete();
        $this->successMessage('Deleted success');
        return redirect()->back();
        }
   }
}
