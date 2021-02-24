<?php

use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\MessageController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\ProfileController;
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

Route::group(['namespace' => 'Site', 'middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('user.login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('site.post.login');

    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'postRegister'])->name('site.post.register');

    Route::get('/password/forgot', [AuthController::class, 'forgotPassword'])->name('password.forgot');
    Route::post('/password/forgot', [AuthController::class, 'postForgotPassword'])->name('post.password.forgot');

    Route::get('/password/reset', [AuthController::class, 'restPassword'])->name('password.reset');
    Route::post('/password/reset', [AuthController::class, 'postResetPassword'])->name('password.reset.post');

    Route::get('confirmation', [AuthController::class, 'confirmation'])->name('confirmation');
    Route::post('confirmation', [AuthController::class, 'postConfirmation'])->name('post.confirmation');

});
Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function () {
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::post('/create',[CategoryController::class,'create'])->name('category.create');
        Route::post('/update',[CategoryController::class,'update'])->name('category.update');
        Route::post('/delete',[CategoryController::class,'delete'])->name('category.delete');

    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/',[ProductController::class,'index'])->name('product.index');
        Route::post('/create',[ProductController::class,'create'])->name('product.create');

        Route::post('/product/update',[ProductController::class,'update'])->name('product.update');
        Route::post('/delete', [ProductController::class, 'delete'])->name('product.delete');

    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/',[ProfileController::class,'profile'])->name('profile');
        Route::post('/update/',[ProfileController::class,'update'])->name('profile.update');
        Route::post('/update/password',[ProfileController::class,'updatePassword'])->name('profile.password');
    });



    Route::group(['prefix' => 'company-info'], function () {
    Route::get('/',[\App\Http\Controllers\Site\StoreController::class,'index'])->name('company-info.index');
    Route::post('/create',[\App\Http\Controllers\Site\StoreController::class,'create'])->name('company-info.create');

    Route::post('/update-stores',[\App\Http\Controllers\Site\StoreController::class,'updateStore'])->name('company-info.update.store');

    Route::post('/update-stores-password',[\App\Http\Controllers\Site\StoreController::class,'updateStorePassword'])->name('store_password');

    });
        Route::group(['prefix' => 'message'], function () {
        Route::get('/',[MessageController::class,'index'])->name('message');
        Route::post('/message',[MessageController::class,'create'])->name('message.post');
    });
});


