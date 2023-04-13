<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UnitController;
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

Route::group(['prefix'=>'admin'],function(){
    Route::resource('/category',CategoryController::class);
    Route::resource('/brand',BrandController::class);
    Route::get('/category-status{category}',[CategoryController::class,'status'])->name('category.status');
    Route::get('/brand-status{brand}',[BrandController::class,'status'])->name('brand.status');

    Route::resource('size', SizeController::class);
    Route::resource('unit', UnitController::class);
});
