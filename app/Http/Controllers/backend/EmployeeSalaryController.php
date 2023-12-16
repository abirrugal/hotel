<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EmployeeSalaryController extends Controller
{

      //salary 
public function salary(){

    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
      $infos = EmployeeSalary::where('which_branch', auth()->user()->branch)->latest()->paginate(20);
    }else{
      $infos = EmployeeSalary::latest()->paginate(20);
    }
      
   
      
      return view('backend.salary.index', compact('infos'));
   
       }
  

   
   //Create salary 
    public function create_salary(){
        
        $employee = Employee::all();
       return view('backend.salary.new', compact('employee'));
    }
   
    //Store salary 
   
    public function store_salary(Request $request){


       $validator = Validator::make($request->all(), [
           'name'                => 'required|min:2',
           'date'                => 'required',
           'salary'                => 'required|min:2',   
       ]);
   
       if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
       }
   
  
       $current_day = Carbon::now()->format('d');  
       $final_date = $request->date.'-'.$current_day;
     $salary_date = Carbon::parse($final_date)->toDateTimeString();





//   {{ $object->created_at->format('d') }}
  

 
   
    $employ_salary = EmployeeSalary::create([
  
              'name'              => $request->name,
              'date'              => $salary_date,
              'salary'              => $request->salary,
              'tada'              => $request->tada,
              'reduced'              => $request->reduced,
              'which_branch' => auth()->user()->branch
           ]);

           $salary = $request->salary;
           $tada = $request->tada;

           $reduced = $request->reduced;

           $main_salary = $salary+$tada;

           $total = $main_salary-$reduced; 

     Expense::create([
        'title' => 'Expense For Monthly Salary.',
        'date' => $salary_date,
        'reson' => 'Paid Salary To ' . $request->name,
        'by' => 'HR',
        'amount' =>$total,
        'method' => 'Cash On Hand',
        'salary_id' => $employ_salary->id,
        'which_branch' => auth()->user()->branch

     ]);
   
       $this->successMessage('Created success');
       return redirect()->back();
   
  
   
    }
   
    //Goto Edit page salary 
    public function edit_salary($id){
   
   
       $info = EmployeeSalary::find($id);
   
   
       return view('backend.salary.edit', compact('info'));
       
    }
   
    //Update Slider salary 
    public function update_salary(Request $request, $id){
   
   $management = EmployeeSalary::find($id);
  
   $validator = Validator::make($request->all(), [
    'date'                => 'required',
    'salary'                => 'required|min:2',
 
]);
   
       if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
       }
   

       $current_day = Carbon::now()->format('d');  
       $final_date = $request->date.'-'.$current_day;
     $salary_date = Carbon::parse($final_date)->toDateTimeString();
   
     $management->update([
  
      'date'              => $salary_date,
      'salary'              => $request->salary,
      'tada'              => $request->tada,
      'reduced'              => $request->reduced,

  ]);



  $salary = $request->salary;
  $tada = $request->tada;

  $reduced = $request->reduced;

  $main_salary = $salary+$tada;

  $total = $main_salary-$reduced; 

  $expense = Expense::find($id);

  $expense->update([
    'title' => 'Expense For Monthly Salary.',
    'date' => $salary_date,
    'by' => 'HR',
    'amount' =>$total,
    'method' => 'Cash On Hand',
  ]);


            
  
       $this->successMessage('Updated success');
       return redirect()->back();
   
       
   
   
    }
    //Delete Slider salary 
    public function delete_salary($id){
   
      // if (auth()->user()->role_as !== 'creator'){
  
        $slider_img = EmployeeSalary::find($id);
    
        $slider_img->delete();
        $this->successMessage('Deleted success');
        return redirect()->back();
      // }
  
    }
  

  
  
  public function salary_info_filter(Request $request){
  


    $start_date = Carbon::parse($request->start_date)
    ->toDateTimeString();

    $end_date = Carbon::parse($request->end_date)
    ->toDateTimeString();




    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
      $infos = EmployeeSalary::where('which_branch', auth()->user()->branch)->whereBetween('date', [$start_date,$end_date])->paginate(20);


    }else{
      $infos = EmployeeSalary::whereBetween('date', [$start_date,$end_date])->paginate(20);
   
    }
  
  
   
  
    return view('backend.salary.index', compact('infos'));
  }
  
  
}
