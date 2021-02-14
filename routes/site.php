<?php

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
        Route::post('/category',[CategoryController::class,'create'])->name('category.create');

        Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::post('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/',[ProductController::class,'index'])->name('product.index');
        Route::post('/product',[ProductController::class,'create'])->name('product.create');

        Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
        Route::post('/delete', [ProductController::class, 'delete'])->name('product.delete');


    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/',[ProfileController::class,'profile'])->name('profile');
        Route::post('/',[ProfileController::class,'update'])->name('profile.update');
    });
    Route::group(['prefix' => 'message'], function () {
        Route::get('/',[MessageController::class,'message'])->name('message');
    });
});


