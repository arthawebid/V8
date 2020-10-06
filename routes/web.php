<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aboutus', function(){
    echo "Ini Merupakan contoh sebuah page (page About)";
})->name("tentang");

Route::get('/show/{id?}', function($id=1){
    echo "Paramter ID: " . $id;
})->where('id','[0-9]+');

Route::get('/utama',function(){
    echo "Ini Page Utama";
    echo "<br>";
    echo "<a href='".route('tentang')."'>About</a>";
});