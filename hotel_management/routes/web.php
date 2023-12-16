<?php

use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\BranchController;
use App\Http\Controllers\backend\CheckInController;
use App\Http\Controllers\backend\ClientRegController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\EmployeeSalaryController;
use App\Http\Controllers\backend\ExpenseController;
use App\Http\Controllers\backend\RoomCleanController;
use App\Http\Controllers\backend\RoomInfoController;
use App\Http\Controllers\backend\TransModeController;
use App\Http\Controllers\backend\VoucherController;
use App\Http\Controllers\backend\VoucherTypeController;
use App\Http\Controllers\BranchUserController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





// Admin Section 

Route::name('admin.')->prefix('admin')->middleware(['auth', 'Dashboard'])->group(function () {
    
    Route::get('/', [adminController::class,'adminHome'])->name('index');
});


// ->middleware(['auth', 'Dashboard'])

// Route for Room
Route::name('admin.')->prefix('admin/room')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [RoomInfoController::class,'room'])->name('room');
    Route::get('/free', [RoomInfoController::class,'free_room'])->name('room.free');
    Route::get('/create', [RoomInfoController::class,'create_room'])->name('room.create');
    Route::post('/create', [RoomInfoController::class,'store_room']);
    Route::get('/{id}/edit', [RoomInfoController::class,'edit_room'])->name('room.edit');
    Route::put('/{id}', [RoomInfoController::class,'update_room'])->name('room.update');

    Route::get('/list', [RoomInfoController::class,'room_list'])->name('room_list');

    Route::post('/filter', [RoomInfoController::class,'room_info_filter'])->name('room_info_filter');
    Route::post('/free/filter', [RoomInfoController::class,'free_room_info_filter'])->name('free.room_info_filter');


});
Route::delete('admin/room/{id}', [RoomInfoController::class,'delete_room'])->name('admin.room.delete')->middleware('isCreator');


// Route for Reservation
Route::name('admin.')->prefix('admin/reservation')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [ClientRegController::class,'reservation'])->name('reservation');
    Route::get('/create', [ClientRegController::class,'create_reservation'])->name('reservation.create');
    Route::post('/create', [ClientRegController::class,'store_reservation']);
    Route::get('/{id}/edit', [ClientRegController::class,'edit_reservation'])->name('reservation.edit');
    Route::put('/{id}', [ClientRegController::class,'update_reservation'])->name('reservation.update');
    
    Route::get('/{id}/delete_room', [ClientRegController::class,'delete_room'])->name('room.delete');

    Route::get('/list', [ClientRegController::class,'reservation_list'])->name('reservation_list');

    Route::post('/filter', [ClientRegController::class,'reservation_filter'])->name('reservation_filter');

});
Route::delete('admin/reservation/{id}', [ClientRegController::class,'delete_reservation'])->name('admin.reservation.delete')->middleware('isCreator');



// Route for Check-In
Route::name('admin.')->prefix('admin/check_in')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [CheckInController::class,'check_in'])->name('check_in');
    Route::get('/check_out_list', [CheckInController::class,'check_out_list'])->name('check_out.list');

    Route::get('/create', [CheckInController::class,'create_check_in'])->name('check_in.create');
    Route::post('/create', [CheckInController::class,'store_check_in']);
    Route::get('/{id}/edit', [CheckInController::class,'edit_check_in'])->name('check_in.edit');

    Route::get('/{id}/con_check', [CheckInController::class,'con_check_in'])->name('check_in.con');
    Route::get('/{id}/out', [CheckInController::class,'check_out'])->name('check_in.out');
    Route::get('/{id}/guest_info', [CheckInController::class,'guest_info'])->name('check_in.guest_info');
    

    Route::put('/{id}', [CheckInController::class,'update_check_in'])->name('check_in.update');

    Route::get('/list', [CheckInController::class,'check_in_list'])->name('check_in_list');

    Route::post('/filter', [CheckInController::class,'check_in_filter'])->name('check_in_filter');
    Route::post('/check_out/filter', [CheckInController::class,'check_out_filter'])->name('check_out_filter');

    


});
Route::delete('admin/check_in/{id}', [CheckInController::class,'delete_check_in'])->name('admin.check_in.delete')->middleware('isCreator');
Route::delete('admin/check_out/{id}', [CheckInController::class,'delete_check_out'])->name('admin.check_out.delete')->middleware('isSuperAdmin');



// Route for Voucher
Route::name('admin.')->prefix('admin/voucher')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [VoucherController::class,'voucher'])->name('voucher');
    Route::get('/inactive', [VoucherController::class,'inactive_voucher'])->name('voucher.inactive');
    Route::post('/create', [VoucherController::class,'store_voucher'])->name('voucher.store');
    Route::get('/create/{id}', [VoucherController::class,'create_voucher'])->name('voucher.create');
    // Route::get('/{id}/edit', [VoucherController::class,'edit_voucher'])->name('voucher.edit');
    // Route::put('/{id}', [VoucherController::class,'update_voucher'])->name('voucher.update');
    Route::get('/{id}/change_sts', [VoucherController::class,'change_sts'])->name('voucher.change_sts');

    Route::get('/{id}/invoice', [VoucherController::class,'voucher_invoice'])->name('voucher.invoice');
    Route::get('/list', [VoucherController::class,'voucher_list'])->name('voucher.list');

    Route::get('/balance_sheet', [VoucherController::class,'balance_sheet'])->name('balance.sheet');
    Route::post('/balance_sheet/filter', [VoucherController::class,'balance_sheet_filter'])->name('balance.sheet.filter');

    Route::get('/total_balance_sheet', [VoucherController::class,'total_balance_sheet'])->name('total_balance.sheet');

    Route::post('/filter', [VoucherController::class,'voucher_filter'])->name('voucher_filter');
    Route::post('/inactive/filter', [VoucherController::class,'inactive_voucher_filter'])->name('voucher_filter.inactive');


});

Route::get('admin/voucher/{id}/edit', [VoucherController::class,'edit_voucher'])->name('admin.voucher.edit')->middleware('isVoucher');
Route::put('admin/voucher/{id}', [VoucherController::class,'update_voucher'])->name('admin.voucher.update')->middleware('isVoucher');
Route::delete('admin/voucher/{id}', [VoucherController::class,'delete_voucher'])->name('admin.voucher.delete')->middleware('isVoucher');



// Route for Collect money
Route::name('admin.')->prefix('admin/collect')->middleware(['auth', 'Dashboard'])->group(function () {


    Route::get('/', [VoucherController::class,'collect'])->name('collect');
    Route::post('/filter', [VoucherController::class,'collect_filter'])->name('collect_filter');
   
    
});


// Route for Expense
Route::name('admin.')->prefix('admin/expense')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [ExpenseController::class,'expense'])->name('expense');

    Route::post('/filter', [ExpenseController::class,'expense_info_filter'])->name('expense.filter');
    
    Route::get('/create', [ExpenseController::class,'create_expense'])->name('expense.create');
    Route::post('/create', [ExpenseController::class,'store_expense']);
    Route::get('/{id}/edit', [ExpenseController::class,'edit_expense'])->name('expense.edit');
    Route::put('/{id}', [ExpenseController::class,'update_expense'])->name('expense.update');

});
Route::delete('/admin/expense/{id}', [ExpenseController::class,'delete_expense'])->name('admin.expense.delete')->middleware('isCreator');


//All room Info

Route::name('admin.')->prefix('admin/room_info')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [RoomInfoController::class,'room_info'])->name('room_info');

});

// Route for Clean room
Route::name('admin.')->prefix('admin/room_clean')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [RoomCleanController::class,'room_clean'])->name('room_clean');
    Route::post('/filter', [RoomCleanController::class,'room_clean_filter'])->name('room_clean.filter');
    Route::get('/{id}/edit', [RoomCleanController::class,'edit_room_clean'])->name('room_clean.edit');
    Route::put('/{id}', [RoomCleanController::class,'update_room_clean'])->name('room_clean.update');


});


                    // Branch Dynamic Section // 
             



// Route for voucher Trans Mode
Route::name('admin.')->prefix('admin/trans_mode')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [TransModeController::class,'trans_mode'])->name('trans_mode');
    Route::get('/create', [TransModeController::class,'create_trans_mode'])->name('trans_mode.create');
    Route::post('/create', [TransModeController::class,'store_trans_mode']);
    Route::get('/{id}/edit', [TransModeController::class,'edit_trans_mode'])->name('trans_mode.edit');
    Route::put('/{id}', [TransModeController::class,'update_trans_mode'])->name('trans_mode.update');
    
});

Route::delete('admin/trans_mode/{id}', [TransModeController::class,'delete_trans_mode'])->name('admin.trans_mode.delete')->middleware('isCreator');


// Route for voucher Type
Route::name('admin.')->prefix('admin/voucher_type')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [VoucherTypeController::class,'voucher_type'])->name('voucher_type');
    Route::get('/create', [VoucherTypeController::class,'create_voucher_type'])->name('voucher_type.create');
    Route::post('/create', [VoucherTypeController::class,'store_voucher_type']);
    Route::get('/{id}/edit', [VoucherTypeController::class,'edit_voucher_type'])->name('voucher_type.edit');
    Route::put('/{id}', [VoucherTypeController::class,'update_voucher_type'])->name('voucher_type.update');
    
});

Route::delete('admin/voucher_type/{id}', [VoucherTypeController::class,'delete_voucher_type'])->name('admin.voucher_type.delete')->middleware('isCreator');


// Route for Employee Mode
Route::name('admin.')->prefix('admin/employee')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [EmployeeController::class,'employee'])->name('employee');
    Route::post('/active/employee_filter', [EmployeeController::class,'active_employee_filter'])->name('active.employee.filter');
    Route::post('/inactive/employee_filter', [EmployeeController::class,'inactive_employee_filter'])->name('inactive.employee.filter');
    Route::get('/list', [EmployeeController::class,'employee_list'])->name('employee.list');
    Route::get('/create', [EmployeeController::class,'create_employee'])->name('employee.create');
    Route::post('/create', [EmployeeController::class,'store_employee']);
    Route::get('/{id}/edit', [EmployeeController::class,'edit_employee'])->name('employee.edit');
    Route::put('/{id}', [EmployeeController::class,'update_employee'])->name('employee.update');
    Route::get('/{id}/change_sts', [EmployeeController::class,'change_sts'])->name('employee.change_sts');

});

Route::delete('admin/employee/{id}', [EmployeeController::class,'delete_employee'])->name('admin.employee.delete')->middleware('isCreator');



  //Auth Releted

//User Account Create/Register 
Route::name('admin.')->prefix('admin/register')->middleware(['auth', 'isSuperAdmin'])->group(function () {

    Route::get('/', [AuthController::class, 'account'])->name('account');
    Route::post('/', [AuthController::class, 'create_account']);

 
});


//Users List And Give Permission
   Route::name('admin.')->prefix('admin/user')->middleware(['auth', 'isSuperAdmin'])->group(function () {
    Route::get('/', [AuthController::class, 'user_list'])->name('user');
    Route::delete('/{id}', [AuthController::class,'delete_user'])->name('user.delete');
    Route::put('/role', [AuthController::class, 'changeRole'])->name('user.role');

    });

// Redirect to home 

Route::get('/register', [AuthController::class, 'register_re'])->name('register');

//Super Admin Register
Route::get('/superadmin/register', [AuthController::class, 'superregister'])->name('admin.register');
Route::post('/superadmin/register', [AuthController::class, 'superregister_store'])->name('admin.register');


// Login And Logout 


Route::get('admin/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('admin/login', [AuthController::class, 'login_store'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


//Branch Account Create/Register 
Route::name('admin.')->prefix('admin/branch')->middleware(['auth', 'isSuperAdmin'])->group(function () {

    Route::get('/', [BranchController::class, 'branch_list'])->name('branch.list');
    Route::get('/new', [BranchController::class, 'create_branch'])->name('branch.new');
    Route::post('/new', [BranchController::class, 'store_branch']);

 
});

Route::name('admin.')->prefix('admin/branch')->group(function () {
Route::get('/login', [BranchController::class, 'login_branch'])->name('branch.login')->middleware('guest');
Route::post('/login', [BranchController::class, 'login_store_branch'])->middleware('guest');
});


// User Create by branch 



Route::name('admin.')->prefix('admin/branch')->middleware(['auth', 'isBranch'])->group(function () {

    Route::get('/create', [BranchUserController::class, 'branch_user_create'])->name('branch.create');
    Route::post('/create', [BranchUserController::class, 'branch_user_store']);

    Route::get('/user_list', [BranchUserController::class, 'user_list'])->name('branch.user');
    Route::delete('/{id}', [BranchUserController::class,'delete_user'])->name('branch.user.delete');
});


// Route for Salary
Route::name('admin.')->prefix('admin/salary')->middleware(['auth', 'Dashboard'])->group(function () {

    Route::get('/', [EmployeeSalaryController::class,'salary'])->name('salary');
    Route::post('/filter', [EmployeeSalaryController::class,'salary_info_filter'])->name('salary.filter');
    Route::get('/create', [EmployeeSalaryController::class,'create_salary'])->name('salary.create');
    Route::post('/create', [EmployeeSalaryController::class,'store_salary']);
    Route::get('/{id}/edit', [EmployeeSalaryController::class,'edit_salary'])->name('salary.edit');
    Route::put('/{id}', [EmployeeSalaryController::class,'update_salary'])->name('salary.update');

});

Route::delete('admin/room/{id}', [EmployeeSalaryController::class,'delete_salary'])->name('admin.salary.delete')->middleware('isCreator');
