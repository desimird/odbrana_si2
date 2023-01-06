<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::post('/updatepsw', [UserController::class, 'update_password']);

Route::get('/destroy', [UserController::class, 'destroy']);

Route::get('/admin/index', [ListingController::class, 'admin_listings'])->middleware('auth');

Route::get('/deletepost/{id}', [ListingController::class, 'destroy']);

// Route::get('/deletepost/{id}', function ($id) {
//     dd($id);
//     return $id;
// });


Route::get('admin/on_hold', [ListingController::class, 'listings_on_hold']);

Route::get('/approve/{id}', [ListingController::class, 'approve']);

Route::get('admin/users', [UserController::class, 'admin_users']);

Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);


Route::post('/det_search', [ListingController::class, 'det_search']);