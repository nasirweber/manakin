<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FaqController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
    
    Route::get('admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
    Route::post('admin/update/password',[AdminController::class,'AdminUpdatePassword'])->name('admin.update.password');

});
Route::get('admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');
Route::get('admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
Route::middleware(['auth','role:agent'])->group(function(){
     Route::get('agent/dashboard',[AgentController::class,'AgentDashboard']);
});
//Roles
Route::get('all/roles',[RoleController::class,'AllRoles'])->name('all.roles');
Route::get('add/roles',[RoleController::class,'AddRoles'])->name('add.roles');
Route::post('store/roles',[RoleController::class,'StoreRoles'])->name('store.roles');
Route::get('edit/roles/{id}',[RoleController::class,'EditRoles']);
Route::post('update/roles/{id}',[RoleController::class,'UpdateRoles'])->name('update.roles');
Route::get('delete/roles/{id}',[RoleController::class,'DeleteRoles'])->name('delete.roles');
Route::get('faq',[FaqController::class,'ViewFaq'])->name('faq');
Route::post('store/faq',[FaqController::class,'StoreFaq'])->name('store.faq');
Route::post('update/faq/{id}',[FaqController::class,'UpdateFaq'])->name('update.faq');





