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

Route::namespace('Admin')->middleware('can:manage-users')->group(function (){
    Route::resource('/users' , 'UsersController' , ['except' => 'show']);
});

Route::namespace('Category')->group(function (){
    Route::resource('/category' , 'CategoryController', ['except' =>['create' , 'show' ,'edit']]  );
});

Route::namespace('News')->group(function (){
    Route::resource('/news' , 'NewsController' ,['except' => 'edit']);
    Route::get('/search' , 'NewsController@search')->name('search');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');
