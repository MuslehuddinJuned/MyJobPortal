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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

  
Route::resource('posted_job', 'posted_job_controller');

Route::get('applied_job/applicant_list/{id}', 'applied_job_controller@applicant_list');
Route::resource('applied_job', 'applied_job_controller');  
Route::resource('user_basic', 'user_controller');  
