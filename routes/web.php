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
Route::get('/todo/edit','TodosController@edit')->name('Todo_edit');
Route::post('/todo/edit','TodosController@edit')->name('Todo_update');
Route::post('/todo/delete/{id}','TodosController@delete');
Route::post('/todo/create','TodosController@create');
