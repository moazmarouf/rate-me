<?php

use App\Http\Controllers\Dashboard\DashboardController;
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
Route::group(['namespace' => 'Dashboard','prefix' => 'admin'],function(){
    Route::get('/login',[DashboardController::class,'login'])->name('admin.login');
    Route::post('/login',[DashboardController::class,'postLogin'])->name('admin.login.post');
    Route::get('/logout',[DashboardController::class,'logoutAdmin'])->name('admin.logout');

});

Route::group(['namespace' => 'Dashboard','prefix' => 'admin','middleware' => 'admin'],function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
});

