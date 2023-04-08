<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
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
Route::get('/admin-login',[AdminController::class,'admin_login_page'])
->name('admin_login.page');
Route::get('/admin/dashboard',[AdminAuthController::class,'admin_dashboard_page'])
->name('admin_dashboard.page')->middleware('isAdminLogin');
Route::post('/admin-login',[AdminAuthController::class,'admin_login']);
Route::get('/admin-logout',[AdminAuthController::class,'admin_logout'])->name('admin.logout');
