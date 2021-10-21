<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorsController;

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

Route::get('/', 'PlaybillController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::resource('actors','ActorController');

Route::resource('actorroles','ActorRoleController');

Route::resource('actorschangeinformations','ActorsChangeInformationController');

Route::resource('administrations','AdministrationController');

Route::resource('administrativepositions','AdministrativePositionController');

Route::resource('casts','CastController');

Route::resource('eventcategories','EventCategoryController');

Route::resource('events','EventController');

Route::resource('playbills','PlaybillController');

Route::resource('positions','PositionController');

Route::resource('rehearsals','RehearsalController');

Route::resource('roles','RoleController');

Route::resource('spectaclesroles','SpectaclesRoleController');

Route::resource('troupes','TroupeController');

Route::resource('typesofrehearsals','TypesOfRehearsalController');

