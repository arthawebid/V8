<?php
 
use illuminate\support\facades\route;
use App\Http\Controllers\Prak9Controller;
use App\Http\Controllers\Prak10Controller;
use App\Http\Controllers\Prak11Controller;
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

Route::get('/prak9_01',[Prak9Controller::class,'QB_tugas1']);
Route::get('/prak9_02',[Prak9Controller::class,'QB_tugas2']);
Route::get('/prak9_03',[Prak9Controller::class,'QB_tugas3']);
Route::resource('/prak10',Prak10Controller::class);

//Versi 8
Route::resource('/prak11',Prak11Controller::class);