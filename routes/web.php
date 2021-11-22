<?php

use App\Http\Controllers\Usercontroller;
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
//     return view('welcome');
// });
Route::get('/',[Usercontroller::class,'index'])->name('home');

Route::post('/user/add',[Usercontroller::class,'addData'])->name('add.user');
Route::post('/user/get',[Usercontroller::class,'getData'])->name('get.user');
Route::post('/user/update',[Usercontroller::class,'updateData'])->name('update.user');
Route::post('/user/delete',[Usercontroller::class,'deleteUser'])->name('delete.user');

