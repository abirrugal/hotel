<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ExpenseController extends Controller
{
           //expense 
public function expense(){


  if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

    $infos = Expense::where('which_branch', auth()->user()->branch)->latest()->paginate(20);
    $expense_sum = Expense::where('which_branch', auth()->user()->branch)->sum('amount');

  }else{
    $infos = Expense::latest()->paginate(20);
    $expense_sum = Expense::sum('amount');
 
  }


    return view('backend.expense.index', compact('infos','expense_sum'));
 
     }

// public function expense(){
//   return view('backend.expense.expense_list_demo');
// }





 
 //Create expense 
  public function create_expense(){
    
    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

      $employees = Employee::where('status','active')->where('which_branch', auth()->user()->branch)->latest()->get();

    }else{
      $employees = Employee::where('status','active')->latest()->get();

   
    }



     return view('backend.expense.new', compact('employees'));
  }
 
  //Store expense 
 
  public function store_expense(Request $request){
 
     $validator = Validator::make($request->all(), [
         'title'                => 'required|min:2',
         'date'                => 'required|min:2',
         'reson'                => 'min:2',
         'expense_by'                => 'required|min:2',
         'amount'                => 'required|min:2',
         'method'                => 'required|min:2',
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 

     $date =Carbon::parse($request->date)
     ->toDateTimeString();

 
   Expense::create([

            'title'              => $request->title,
            'date'              => $date,
            'reson'              => $request->reson,
            'by'              => $request->expense_by,
            'amount'              => $request->amount,
            'method'              => $request->method,
            'which_branch' => auth()->user()->branch
         
         ]);
 
     $this->successMessage('Created success');
     return redirect()->back();
 

 
  }
 
  //Goto Edit page expense 
  public function edit_expense($id){
 

    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  


      $employees = Employee::where('status','active')->where('which_branch', auth()->user()->branch)->latest()->get();


    }else{
      $employees = Employee::where('status','active')->latest()->get();
   
    }


     $info = Expense::find($id);
 
 
     return view('backend.expense.edit', compact('info','employees'));
     
  }
 
  //Update Slider expense 
  public function update_expense(Request $request, $id){
 
 $management = Expense::find($id);

    $validator = Validator::make($request->all(), [

        'title'                => 'required|min:2',
        'date'                => 'required|min:2',
        'reson'                => 'min:2',
        'expense_by'                => 'required|min:2',
        'amount'                => 'required|min:2',
        'method'                => 'required|min:2',
        
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 
 
   $management->update([

    'title'              => $request->title,
    'date'              => $request->date,
    'reson'              => $request->reson,
    'by'              => $request->expense_by,
    'amount'              => $request->amount,
    'method'              => $request->method,
         
]);
 
          

     $this->successMessage('Updated success');
     return redirect()->back();
 
     
 
 
  }
  //Delete Slider expense 
  public function delete_expense($id){
 
    // if (auth()->user()->role_as !== 'creator'){

      $slider_img = Expense::find($id);
  
      $slider_img->delete();
      $this->successMessage('Deleted success');
      return redirect()->back();
    // }

  }

  
public function expense_info_filter(Request $request){

 
  $start_date = Carbon::parse($request->start_date)
  ->toDateTimeString();

  $end_date = Carbon::parse($request->end_date)
  ->toDateTimeString();

  
  if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {


    $infos = Expense::where('which_branch', auth()->user()->branch)->whereBetween('date', [$start_date,$end_date])->get();

    $expense_sum = Expense::where('which_branch', auth()->user()->branch)->whereBetween('date', [$start_date,$end_date])->sum('amount');


  }else{


  $infos = Expense::whereBetween('date', [$start_date,$end_date])->get();


  $expense_sum = Expense::whereBetween('date', [$start_date,$end_date])->sum('amount');
  }
  

 
  

  return view('backend.expense.index', compact('infos','expense_sum'));
}
}
