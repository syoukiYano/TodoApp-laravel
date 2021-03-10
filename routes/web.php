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

Route::get('/','TodosController@index');
Route::post('/todo/edit/{id}','TodosController@update');
Route::post('/todo/delete/{id}','TodosController@delete');
Route::post('/todo/create','TodosController@create');
