<?php

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

Route::middleware(['auth'])->group(function ()
{
  //Read
  Route::get('/', 'TodoController@show');
  // Route::get('/', function () {
  //     return view('/index');
  // });

  //Create, Update, Delete
  Route::post('/todos', 'TodoController@store');
  Route::put('/todos/{todo}', 'TodoController@update');
  Route::delete('/todos/{todo}', 'TodoController@destroy');

  Route::put('/todos/complete/{todo}', 'TodoController@complete');
  Route::put('/todos/order/{todo}', 'TodoController@sort');
});
//Register & login


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
