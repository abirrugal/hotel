<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{


      
  public function create_branch(){

    return view('backend.branch.new');

  }

  public function store_branch(Request $request){

     
    if(auth()->user()->role_as === 'superadmin'){


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
          'role_as' => 'branch',
          'branch' => $request->name,
          
      ]);
  
  
          $this->successMessage('Branch created success');
  
  
          return redirect()->back();
  }

  }

  public function branch_list(){

    $slider_images =  User::where('role_as', 'branch')->where('branch', auth()->user()->branch)->get();

    return view('backend.branch.index' , compact('slider_images'));

  }


  public function login_branch(){
    return view('backend.branch.login');

  }

  public function login_store_branch(Request $request){

    $validator = Validator::make($request->all(), [
        
      'name' => 'required|min:2',    
      'password' => 'required|min:4'

  ]);

  if($validator->fails()){
      return redirect()->back()->withErrors($validator)->withInput()->withInput();
  }


  if (Auth::attempt(['name' => $request->name, 'password' => $request->password], $request->remember)) {
    $this->successMessage('Logged in success');
        return redirect()->route('admin.index');
} 


  }

}
