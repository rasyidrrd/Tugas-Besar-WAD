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

Route::resource('/', 'App\Http\Controllers\HomeController', [
    'names' => [
        'index' => 'home',
        'create' => 'home.login',
        'store' => 'home.store'
    ]
]);
Route::resource('/user', 'App\Http\Controllers\UserController');
Route::resource('/admin', 'App\Http\Controllers\AdminController');
Route::resource('/vacancies', 'App\Http\Controllers\VacanciesController');
Route::resource('/application', 'App\Http\Controllers\ApplicationController');

Route::get('/lowongan', 'App\Http\Controllers\VacanciesController@list')->name('lowongan');
