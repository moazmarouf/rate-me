<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MembersController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\StoreController;
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
    Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::group(['prefix' => 'stores'],function(){
        Route::get('index',[StoreController::class,'index'])->name('store.index');
        Route::post('create',[StoreController::class,'create'])->name('store.create');
        Route::post('update',[StoreController::class,'update'])->name('store.update');
        Route::post('delete',[StoreController::class,'delete'])->name('store.delete');
    });
    Route::group(['prefix' => 'categories'],function(){
        Route::get('index',[CategoryController::class,'index'])->name('categories.index');
        Route::post('create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('update',[CategoryController::class,'update'])->name('categories.update');
        Route::post('delete',[CategoryController::class,'delete'])->name('categories.delete');
    });
    Route::group(['prefix' => 'users'],function(){
        Route::get('/',[MembersController::class,'index'])->name('members.index');
        Route::post('/create',[MembersController::class,'create'])->name('members.create');
        Route::post('/update',[MembersController::class,'update'])->name('members.update');
        Route::post('/delete',[MembersController::class,'delete'])->name('members.delete');

    });
    Route::group(['prefix' => '/messages'],function(){
        Route::get('/',[MessageController::class,'getMessage'])->name('message.dashboard');
        Route::post('/replayed',[MessageController::class,'changeReplayedMessage'])->name('messages.replayed');
        Route::post('/delete',[MessageController::class,'delete'])->name('message.delete');
    });
    Route::group(['prefix' => 'complains'],function(){
        Route::get('/',[MessageController::class,'getComplains'])->name('complains');
    });
});

