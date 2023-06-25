<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignPermissionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('login',[LoginController::class,'UsersLogin'])->name('login');
Route::post('loginpost',[LoginController::class,'LoginPost']);
Route::group(['middleware' => 'auth'], function () {
    route::get('dashboard',[AdminController::class,'DashboardPage'])->name('dashboard');
    route::get('logout',[AdminController::class,'logout'])->name('logout');
    Route::get('rolestatus/{id}',[RolePermissionController::class,'show'])->name('rolestatus');
    Route::resource('rolepermission',RolePermissionController::class);
    Route::resource('permission',PermissionController::class);
    Route::resource('assignpermission',AssignPermissionController::class);
    Route::resource('clienturl',ClientController::class);
    Route::get('userprofile/{id}',[AdminController::class,'UserProfile'])->name('userprofile');
    Route::get('certificate',[AdminController::class,'ClientCertificate'])->name('certificate');
    Route::get('upload_certificate/{id}',[AdminController::class,'UploadCertificate'])->name('upload_certificate');
    Route::post('save_certificate',[AdminController::class,'SaveCertificate'])->name('save_certificate');
    Route::get('my_certificate',[AdminController::class,'MyCertificate'])->name('my_certificate');
    Route::get('institute_img',[AdminController::class,'InstituteImg'])->name('institute_img');
    Route::post('ins_save_img',[AdminController::class,'InsSaveImg'])->name('ins_save_img');
    Route::get('display_img',[AdminController::class,'DisplayImg'])->name('institute_img_display');
    Route::get('manage_institute_img',[AdminController::class,'ManageInstImg'])->name('manage_institute_img');
    Route::get('edit_inst_img/{id}',[AdminController::class,'EditInstImg'])->name('edit_inst_img');
    Route::delete('delete_inst_img/{id}',[AdminController::class,'DeleteInstImg'])->name('delete_inst_img');

    Route::get('admision_csv',[AdminController::class,'AdmissionCSV'])->name('admision_csv');
    Route::post('admision_csv_save',[AdminController::class,'SaveAdmission'])->name('save_admission');
    Route::get('show_admission',[AdminController::class,'ShowAdmission'])->name('show_admission');
});