<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StaffDepartmentController;
use App\Http\Controllers\Admin\StaffController;


use App\Http\Middleware\Admin;
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

Route::get('/', function () {
    return view('welcome');
});
//admin login
Route::match(['get','post'],'/login',[AdminController::class,'login']);
    
Route::group(['middleware'=>['admin']],function () {
   
        Route::get('/admin', function ()
        {
            return view('admin.dashboard');
        });
        
        //RoomTypes
        Route::get('admin/roomtype/{id}/delete',[RoomTypeController::class,'destroy']);
        //delete image
        Route::get('admin/roomtypeimage/delete/{id}',[RoomTypeController::class,'destroyImage']);
        Route::resource('admin/roomtype',RoomTypeController::class);
        
        //Room Controller
        Route::get('admin/rooms/{id}/delete',[RoomController::class,'destroy']);
        Route::resource('admin/rooms',RoomController::class);
        
        //Customer Controller
        Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy']);
        Route::resource('admin/customer',CustomerController::class);
        
         //Staff Department Controller
         Route::get('admin/department/{id}/delete',[StaffDepartmentController::class,'destroy']);
         Route::resource('admin/department',StaffDepartmentController::class);
         
        
        //staff 
        //Staff Department Controller
        Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy']);
        Route::resource('admin/staff',StaffController::class);
        

        //logout 
        
        Route::get('/admin/logout',[AdminController::class,'logout']);
    
    
});





