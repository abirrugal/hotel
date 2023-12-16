<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Client_reg;
use App\Models\Expense;
use App\Models\TransMode;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use App\Models\VoucherType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VoucherController extends Controller
{
     //Active voucher 
public function voucher(){

  if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
 

    $infos = Voucher::where('status', 'Complete')->where('which_branch', auth()->user()->branch)->latest()->paginate(20);

    }else{

      
      $infos = Voucher::where('status','Complete')->latest()->paginate(20);
    }

   
 
  
    return view('backend.voucher.index', compact('infos'));
 
     }

     //Inactive voucher 
public function inactive_voucher(){

    $infos = Voucher::where('status','Panding')->latest()->paginate(20);
   

    
    return view('backend.voucher.inactive_voucher', compact('infos'));
 
     }
 
 //Create voucher 
  public function create_voucher($id){
      

    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

  
  
      $voucher_id = $id;
    $client_infos = Client_reg::where('which_branch', auth()->user()->branch)->get();
    $voucher_type = VoucherType::where('which_branch', auth()->user()->branch)->get();
    $trans_mode = TransMode::where('which_branch', auth()->user()->branch)->get();
    $branch = User::where('role_as','branch')->get();
  
    }else{
      $voucher_id = $id;
      $client_infos = Client_reg::all();
      $voucher_type = VoucherType::all();
      $trans_mode = TransMode::all();
      $branch = User::where('role_as','branch')->get();
    }



    return view('backend.voucher.new', compact('client_infos', 'voucher_id','voucher_type','trans_mode','branch'));
  }
 
  //Store voucher 
 
  public function store_voucher(Request $request){
 
     $validator = Validator::make($request->all(), [
         
         'transaction_date'                => 'required|min:2',
         'voucher_type'                => 'required|min:2',
         'description'                => 'required|min:2',
         'ammount'                => 'required|numeric',
         'status'                => 'required|min:2',
         'client_reg_id'                => 'required',
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 

     $client = Client_reg::find($request->client_reg_id);



     $trans =Carbon::parse($request->transaction_date)
     ->toDateTimeString();
     
    

     Voucher::create([
            'name'                      =>$client->guest_name,
            'transaction_date'              => $trans,
            'voucher_type'              => $request->voucher_type,
            'branch'              => $request->branch,
            'description'              => $request->description,
            'ammount'              => $request->ammount,
            'status'              => $request->status,
            'voucher_ref'              => $request->voucher_ref,
            'trans_mode'              => $request->trans_mode,
            'invoice_ref'              => $request->invoice_ref,
            'client_reg_id'              => $request->client_reg_id,
            'account_no'                =>$request->account_no,
            'bank_name'                =>$request->bank_name,
            'pay_method'                =>$request->pay_method,
            'chequeissue_date'          => $request->chequeissue_date,
            'which_branch' => auth()->user()->branch
         
         ]);
 
     $this->successMessage('Created success');
     return redirect()->back();
 

 
  }
 
  //Goto Edit page voucher 
  public function edit_voucher($id){
 
 
     $voucher = Voucher::find($id);
 
 
     return view('backend.voucher.edit', compact('voucher'));
     
  }
 
  //Update Slider voucher 
  public function update_voucher(Request $request, $id){
 
 $management = Voucher::find($id);

    $validator = Validator::make($request->all(), [

        'transaction_date'                => 'required|min:2',
        'voucher_type'                => 'required|min:2',
        'description'                => 'required|min:2',
        'ammount'                => 'required|numeric',
        'status'                => 'required|min:2',
        
     ]);
 
     if($validator->fails()){
         return redirect()->back()->withErrors($validator)->withInput();
     }
 
     $trans =Carbon::parse($request->transaction_date)
     ->toDateTimeString();

   $management->update([

    'transaction_date'              => $trans,
    'voucher_type'              => $request->voucher_type,
    'branch'              => $request->branch,
    'description'              => $request->description,
    'ammount'              => $request->ammount,
    'status'              => $request->status,
    'voucher_ref'              => $request->voucher_ref,
    'trans_mode'              => $request->trans_mode,
    'invoice_ref'              => $request->invoice_ref,
    'client_reg_id'              => $request->client_reg_id,
    'account_no'                =>$request->account_no,
    'bank_name'                =>$request->bank_name,
    'pay_method'                =>$request->pay_method,
    'chequeissue_date'          => $request->chequeissue_date,
         
]);
 
          

     $this->successMessage('Updated success');
     return redirect()->back();
 
     
 
 
  }
  //Delete Slider voucher 
  public function delete_voucher($id){
 
    // if (auth()->user()->role_as !== 'creator'){

      $slider_img = Voucher::find($id);
  
      $slider_img->delete();
      $this->successMessage('Deleted success');
      return redirect()->back();
    // }

  }

  public function change_sts($id){

    
    $voucher = Voucher::find($id);

   
    if ($voucher->status == "Complete") {
     
      $voucher->status = "Panding";
      $voucher->save();
    }else{

      
      $voucher->status = "Complete";
      $voucher->save();
    }
    

    $this->successMessage('Status Changed Success');
    return redirect()->back();
 
  }

  public function collect(){


    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

      $vouchers = Voucher::where('which_branch', auth()->user()->branch)->where('status','Complete')->paginate(10);
      $total = Voucher::where('which_branch', auth()->user()->branch)->where('status','Complete')->where('which_branch', auth()->user()->branch)->sum('ammount');
  
    }else{
      $vouchers = Voucher::where('status','Complete')->paginate(10);
      $total = Voucher::where('status','Complete')->sum('ammount');
    }

    
   
   
   return view('backend.voucher.collection', compact('vouchers','total'));

  }


  public function collect_filter(Request $request){
    $start_date = Carbon::parse($request->start_date)
    ->toDateTimeString();
  
    $end_date = Carbon::parse($request->end_date)
    ->toDateTimeString();
  
    
    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
  
      $vouchers = Voucher::where('which_branch', auth()->user()->branch)->where('status','Complete')->whereBetween('transaction_date', [$start_date,$end_date])->paginate(20);
      $total = Voucher::where('which_branch', auth()->user()->branch)->where('status','Complete')->whereBetween('transaction_date', [$start_date,$end_date])->sum('ammount');
 
 
  
    }else{
  

      $vouchers = Voucher::where('status','Complete')->whereBetween('transaction_date', [$start_date,$end_date])->paginate(20);
      $total = Voucher::where('status','Complete')->whereBetween('transaction_date', [$start_date,$end_date])->sum('ammount');
 

    }

    return view('backend.voucher.collection', compact('vouchers','total'));
  }


  public function voucher_invoice($id){

    $voucher = Voucher::find($id);

    return view('backend.voucher.invoice', compact('voucher'));
  }





    public function voucher_list(){


    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  


      $infos = Voucher::where('which_branch', auth()->user()->branch)->latest()->paginate(20);
      $voucher_sum = Voucher::where('which_branch', auth()->user()->branch)->sum('ammount');
    }else{
      $infos = Voucher::latest()->paginate(20);
      $voucher_sum = Voucher::sum('ammount');
    }


    $infos = Voucher::latest()->paginate(20);
    $voucher_sum = Voucher::sum('ammount');
    
    return view('backend.voucher.list', compact('infos','voucher_sum'));
  }







  public function total_balance_sheet(){


    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

      $total_collection = Voucher::where('which_branch', auth()->user()->branch)->sum('ammount');
      $total_expense = Expense::where('which_branch', auth()->user()->branch)->sum('amount');

    }else{
      $total_collection = Voucher::sum('ammount');
      $total_expense = Expense::sum('amount');
    }

    return view('backend.voucher.total_balance_sheet', compact('total_collection', 'total_expense'));

  }




  // public function balance_sheet(){

  //   if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
  //     $collections = Voucher::where('which_branch', auth()->user()->branch)->where('status','Complete')->get();
  //     $expenses = Expense::where('which_branch', auth()->user()->branch)->get();
  

  //     $total_collection = Voucher::where('which_branch', auth()->user()->branch)->sum('ammount');
  //     $total_expense = Expense::where('which_branch', auth()->user()->branch)->sum('amount');

  //   }else{
  //     $collections = Voucher::where('status','Complete')->get();
  //     $expenses = Expense::all();

  //   $total_collection = Voucher::where('status','Complete')->sum('ammount');
  //   $total_expense = Expense::sum('amount');
  //   }


    
 
  //   return view('backend.voucher.balance_sheet', compact('collections', 'expenses','total_collection', 'total_expense'));
  // }



  public function balance_sheet(){

 
    return view('backend.voucher.balance_sheet_demo');
  }






  public function voucher_filter(Request $request){
 

    $start_date = Carbon::parse($request->start_date)
    ->toDateTimeString();

    $end_date = Carbon::parse($request->end_date)
    ->toDateTimeString();

    
    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
 
      
    $infos = Voucher::where('status', 'Complete')->where('which_branch', auth()->user()->branch)->whereBetween('transaction_date', [$start_date,$end_date]) 
    ->paginate(20);

    }else{

      
    $infos = Voucher::where('status', 'Complete')->whereBetween('transaction_date', [$start_date,$end_date]) 
    ->paginate(20);
    }




return view('backend.voucher.index', compact('infos'));

  }

  public function inactive_voucher_filter(Request $request){
 

    $start_date = Carbon::parse($request->start_date)
    ->toDateTimeString();

    $end_date = Carbon::parse($request->end_date)
    ->toDateTimeString();

    
    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
 
      
    $infos = Voucher::where('status', 'Panding')->where('which_branch', auth()->user()->branch)->whereBetween('transaction_date', [$start_date,$end_date]) 
    ->paginate(20);

    }else{

      
    $infos = Voucher::where('status', 'Panding')->whereBetween('transaction_date', [$start_date,$end_date]) 
    ->paginate(20);
    }




return view('backend.voucher.index', compact('infos'));

  }






// BALANCE SHEET FILTER




  public function balance_sheet_filter(Request $request){




    $start_date = Carbon::parse($request->start_date)
    ->toDateTimeString();

    $end_date = Carbon::parse($request->end_date)
    ->toDateTimeString();

    
    if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  
 
      $collections = Voucher::where('status','Complete')->where('which_branch', auth()->user()->branch)->whereBetween('transaction_date', [$start_date,$end_date])->get();
      $expenses = Expense::where('which_branch', auth()->user()->branch)->whereBetween('date', [$start_date,$end_date])->get();

      $total_collection = Voucher::where('status','Complete')->where('which_branch', auth()->user()->branch)->whereBetween('transaction_date', [$start_date,$end_date])->sum('ammount');
      $total_expense = Expense::where('which_branch', auth()->user()->branch)->whereBetween('date', [$start_date,$end_date])->sum('amount');


    }else{


    $collections = Voucher::where('status','Complete')->whereBetween('transaction_date', [$start_date,$end_date])->get();
    $expenses = Expense::whereBetween('date', [$start_date,$end_date])->get();;


    $total_collection = Voucher::where('status','Complete')->whereBetween('transaction_date', [$start_date,$end_date])->sum('ammount');
    $total_expense = Expense::whereBetween('date', [$start_date,$end_date])->sum('amount');
    }



    
 
    return view('backend.voucher.balance_sheet', compact('collections', 'expenses','total_collection', 'total_expense'));
  }


}