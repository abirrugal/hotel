<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Client_reg;
use App\Models\Expense;
use App\Models\Room_info;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function adminHome(){
        
// Collection
        if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

            $today_collections = Voucher::whereDate('created_at', Carbon::today())->where('which_branch', auth()->user()->branch)->where('status','Complete')->paginate(10);
        
          }else{
            $today_collections = Voucher::whereDate('created_at', Carbon::today())->where('status','Complete')->paginate(10);
          }

// Free room info 

        if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

            $today_free_room = Room_info::whereDate('created_at', Carbon::today())->where('which_branch', auth()->user()->branch)->where('room_sts','Free')->paginate(5);
        
          }else{
            $today_free_room = Room_info::whereDate('created_at', Carbon::today())->where('room_sts','Free')->paginate(5);
          }



 // Category wise room 

        // if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
  

        //   $today_free_room = Room_info::whereDate('created_at', Carbon::today())->where('which_branch', auth()->user()->branch)->where('room_sts','Free')->paginate(5);
      
        // }else{
        //   $today_free_room = Room_info::whereDate('created_at', Carbon::today())->where('room_sts','Free')->paginate(5);
        // }

// Today's Expenses


        if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
          

          $today_expenses = Expense::whereDate('created_at', Carbon::today())->where('which_branch', auth()->user()->branch)->paginate(5);

        }else{
          $today_expenses = Expense::whereDate('created_at', Carbon::today())->paginate(5);
        }


        // Monthly Expenses


        if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
          
          $total_monthly_expense = Expense::whereMonth('created_at', date('m'))
          ->whereYear('created_at', date('Y'))->where('which_branch', auth()->user()->branch)->sum('amount');

          $monthly_expenses = Expense::whereMonth('created_at', date('m'))
          ->whereYear('created_at', date('Y'))->where('which_branch', auth()->user()->branch)->paginate(5);

        }else{
          $monthly_expenses = Expense::whereDate('created_at', Carbon::today())->whereMonth('created_at', date('m'))
          ->whereYear('created_at', date('Y'))->paginate(5);

          $total_monthly_expense =Expense::whereMonth('created_at', date('m'))
          ->whereYear('created_at', date('Y'))->sum('amount');
        }

// Today's Reservation


        if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
          

          $reservations = Client_reg::whereDate('created_at', Carbon::today())->where('check_in_status', 'no')->where('which_branch', auth()->user()->branch)->paginate(5);

        }else{
          $reservations = Client_reg::whereDate('created_at', Carbon::today())->where('check_in_status', 'no')->paginate(5);
        }



        // Today's Check In


        if (auth()->user()->branch !== null && auth()->user()->role_as !== 'superadmin' && auth()->user()->role_as !== 'admin' || auth()->user()->role_as === 'creator' && auth()->user()->branch !== null) {
          

          $check_ins = Client_reg::whereDate('created_at', Carbon::today())->where('check_in_status', 'yes')->where('which_branch', auth()->user()->branch)->paginate(5);

        }else{
          $check_ins = Client_reg::whereDate('created_at', Carbon::today())->where('check_in_status', 'yes')->paginate(5);
        }



        return view('backend.index', compact('today_collections','today_free_room','today_expenses','reservations','check_ins','monthly_expenses','total_monthly_expense'));
    }
}
