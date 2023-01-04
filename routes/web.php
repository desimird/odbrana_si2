<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [ListingController::class, 'index']);

// Route::get('/register', function() {
//     return view('register');
// });


// Route::get('/profile', function(){
//     return view('profile');
// });

Route::get('/profile', [ListingController::class, 'my_listings'])->middleware('auth');


Route::get('/adding_ad', [ListingController::class, 'create'])->name('login')->middleware('auth');
Route::post('/listing', [ListingController::class, 'store']);



Route::get('/register', [UserController::class, 'create'])->name('login')->middleware('guest');
Route::post('/user', [UserController::class, 'store']);


Route::post('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [UserController::class, 'logout']);
