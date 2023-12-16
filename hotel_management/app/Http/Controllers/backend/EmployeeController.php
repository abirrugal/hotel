<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EmployeeController extends Controller
{
      //employee 
public function employee(){

    
    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
      $infos = Employee::where('status','active')->where('which_branch', auth()->user()->branch)->latest()->paginate(20);


    }else{
      $infos = Employee::where('status','active')->latest()->paginate(20);
   
    }


    return view('backend.employee.index', compact('infos'));
 
     }

public function employee_list(){


  if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
    $infos = Employee::where('status','inactive')->where('which_branch', auth()->user()->branch)->latest()->paginate(20);


  }else{
    $infos = Employee::where('status','inactive')->latest()->paginate(20);
 
  }

    
  return view('backend.employee.list', compact('infos'));

}

 
 //Create employee 
  public function create_employee(){
      
     $branch = User::where('role_as', 'branch')->get();
     return view('backend.employee.new',compact('branch'));
  }
 
  //Store employee 
 
  public function store_employee(Request $request){
 
     $validator = Validator::make($request->all(), [
         'name'                => 'required|min:2',
         'department'                => 'required|min:2',
         'section'                => 'required|min:2',
         'designation'                => 'required|min:2',
         'join_date'                => 'required|min:2',
         'shift_name'                => 'required|min:2',
         'salary_range'                => 'required|min:2',
         'concern'                => 'required|min:2',
         'branch'                => 'required|min:2',
         'bank_no'                => 'required|min:2',
         'status'                => 'required|min:2',
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 


     $join_date =Carbon::parse($request->join_date)
     ->toDateTimeString();
 
   Employee::create([

            'name'                => $request->name,
            'department'                => $request->department,
            'section'                => $request->section,
            'designation'                => $request->designation,
            'join_date'                => $join_date,
            'shift_name'                => $request->shift_name,
            'salary_range'                => $request->salary_range,
            'concern'                => $request->concern,
            'branch'                => $request->branch,
            'bank_no'                => $request->bank_no,
            'status'                => $request->status,
            'which_branch' => auth()->user()->branch
           ]);
 
     $this->successMessage('Created success');
     return redirect()->back();
 

 
  }
 
  //Goto Edit page employee 
  public function edit_employee($id){
 
 
     $info = Employee::find($id);
 
 
     return view('backend.employee.edit', compact('info'));
     
  }
 
  //Update Slider employee 
  public function update_employee(Request $request, $id){
 
 $management = Employee::find($id);

    $validator = Validator::make($request->all(), [

        'name'                => 'required|min:2',
        'department'                => 'required|min:2',
        'section'                => 'required|min:2',
        'designation'                => 'required|min:2',
        'join_date'                => 'required|min:2',
        'shift_name'                => 'required|min:2',
        'salary_range'                => 'required|min:2',
        'concern'                => 'required|min:2',
        'branch'                => 'required|min:2',
        'bank_no'                => 'required|min:2',
        'status'                => 'required|min:2',
        
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }

     $join_date =Carbon::parse($request->join_date)
     ->toDateTimeString();
 
   $management->update([

    'name'                => $request->name,
    'department'                => $request->department,
    'section'                => $request->section,
    'designation'                => $request->designation,
    'join_date'                => $join_date,
    'shift_name'                => $request->shift_name,
    'salary_range'                => $request->salary_range,
    'concern'                => $request->concern,
    'branch'                => $request->branch,
    'bank_no'                => $request->bank_no,
    'status'                => $request->status,
         
]);
 
          

     $this->successMessage('Updated success');
     return redirect()->back();
 
     
 
 
  }
  //Delete Slider employee 
  public function delete_employee($id){
 
    // if (auth()->user()->role_as !== 'creator'){

      $slider_img = Employee::find($id);
  
      $slider_img->delete();
      $this->successMessage('Deleted success');
      return redirect()->back();
    // }

  }

  public function change_sts($id){
    $voucher = Employee::find($id);

   
    if ($voucher->status == "Active") {
     
      $voucher->status = "Inactive";
      $voucher->save();
    }else{

      
      $voucher->status = "Active";
      $voucher->save();
    }
    

    $this->successMessage('Status Changed Success');
    return redirect()->back();
  }



  public function active_employee_filter(Request $request){

    
    $start_date = Carbon::parse($request->start_date)
    ->toDateTimeString();

$end_date = Carbon::parse($request->end_date)
    ->toDateTimeString();




    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
      $infos = Employee::where('status','active')->where('which_branch', auth()->user()->branch)->whereBetween('join_date', [$start_date,$end_date])->paginate(20);


    }else{
      $infos = Employee::where('status','active')->whereBetween('join_date', [$start_date,$end_date])->paginate(20);
   
    }


    return view('backend.employee.index', compact('infos'));
 
     }

     public function inactive_employee_filter(Request $request){
      $start_date = Carbon::parse($request->start_date)
      ->toDateTimeString();
  
  $end_date = Carbon::parse($request->end_date)
      ->toDateTimeString();
  
  
  
  
      if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
    
        $infos = Employee::where('status','inactive')->where('which_branch', auth()->user()->branch)->whereBetween('join_date', [$start_date,$end_date])->paginate(20);
  
  
      }else{
        $infos = Employee::where('status','inactive')->whereBetween('join_date', [$start_date,$end_date])->paginate(20);
     
      }
  
  
      return view('backend.employee.list', compact('infos'));
     }
}
