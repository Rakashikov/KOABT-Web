<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'PlaybillController@index')->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/error', function () {
    return view('error');
}) -> name('error');

Route::get('/rehearsals', 'RehearsalController@index')->name('rehearsals');

Route::get('/actor_playbill', 'ActorPlaybillController@index')->name('actorPlaybill');

Route::get('/administrations', 'AdministrationController@index')->name('administrations');

Route::get('/change-password', 'ProfileController@index')->name('change-password');
Route::post('/change-password', 'ProfileController@store')->name('change.password');
