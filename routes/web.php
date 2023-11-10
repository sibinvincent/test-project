<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::redirect('/', 'home');

Route::group(['prefix'=>'auth','as'=>'auth.'],function (){
    Route::group(['middleware'=>['guest']],function (){
        Route::controller(App\Http\Controllers\Auth\LoginController::class)->group(function (){
            Route::get('/login','loginForm')->name('login-form');
            Route::post('/login','login')->name('login');
            Route::get('/register','registerForm')->name('register-form');
            Route::post('/register','register')->name('register');
        });
    });
    Route::get('/email/verify/{id}/{hash}',[App\Http\Controllers\Auth\RegisterController::class,'emailVerify'])->middleware(['auth','signed'])->name('email.verify');
    Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->middleware('auth')->name('logout');
});
Route::get('/email-verify', [\App\Http\Controllers\Auth\RegisterController::class,'emailVerifyNotice'])->middleware(['auth'])->name('verification.notice');

Route::group(['middleware'=>['auth','verified']],function (){
    Route::get('home',[\App\Http\Controllers\HomeController::class,'home'])->name('home');
    Route::group(['as'=>'transactions.'],function (){
        Route::get('deposit',[\App\Http\Controllers\TransactionController::class,'deposit'])->name('deposit');
        Route::get('withdraw',[\App\Http\Controllers\TransactionController::class,'withdraw'])->name('withdraw');
        Route::get('transfer',[\App\Http\Controllers\TransactionController::class,'transfer'])->name('transfer');
        Route::get('statement',[\App\Http\Controllers\TransactionController::class,'statement'])->name('statement');
        Route::post('transactions/{transaction_type}',[\App\Http\Controllers\TransactionController::class,'store'])->name('store');
    });

});
