<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LanguageController;
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

Route::get('/',[AccountController::class, 'index']);

Route::get('/login', [AccountController::class, 'loginPage']);
Route::post('/login', [AccountController::class, 'login']);

Route::get('/register',[AccountController::class, 'registerPage']);
Route::post('/register',[AccountController::class, 'addAccount']);

Route::post('/setlang/{locale}', [LanguageController::class, 'setlang']);


Route::post('/deleteCart/{id}', [CartController::class, 'deleteCart']);

//Auth
Route::middleware(['Roles'])->group(function (){
    Route::get('/home/{id}', [ItemController::class, 'homePage']);
    Route::get('/logout', [AccountController::class, 'logout']);
    Route::get('/profile/{id}', [AccountController::class, 'profilePage']);
    Route::post('/profile/{id}', [AccountController::class, 'editProfile']);
    Route::get('/cart/{id}', [CartController::class, 'viewCart']);
    Route::get('/item_detail/{id}', [ItemController::class, 'viewDetail']);
    Route::post('/item_detail/{id}', [ItemController::class, 'buyItem']);
    Route::post('/checkout/{id}', [CartController::class, 'checkout']);
    Route::get('/checkout/{id}', [CartController::class, 'checkoutPage']);
});


//Admin
Route::middleware(['AdminRole'])->group(function () {
    Route::get('/account-maintenance', [AccountController::class, 'viewAccount']);
    Route::delete('/delete/{id}', [AccountController::class, 'delAccount']);
    Route::get('/update-role/{id}', [AccountController::class, 'updateRolePage']);
    Route::post('/update-role/{id}', [AccountController::class, 'updateRole']);
});



