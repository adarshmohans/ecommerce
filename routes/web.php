<?php

use App\Http\Controllers\FrontEndController;
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

Route::get('/', 'LoginController@login')->name('login');
Route::post('do-login', 'LoginController@doLogin')->name('do.login');

Route::group(['middleware' => 'user_auth'],function(){

Route::get('logout', 'LoginController@logout')->name('logout');
Route::get('users', 'FrontEndController@home')->name('home');
Route::get('about-us', 'FrontEndController@about')->name('about');
Route::get('contact', 'FrontEndController@contact')->name('contact');
Route::get('home', 'FrontEndController@homepage')->name('homemain');
Route::get('new-user', 'FrontEndController@create')->name('users.create');
Route::post('save-user', 'FrontEndController@save')->name('save.user');
Route::get('edit-user/{userId}', 'FrontEndController@edit')->name('edit.user');
Route::get('view-user/{userId}', 'FrontEndController@view')->name('view.user');
Route::post('update-user', 'FrontEndController@update')->name('update.user');
Route::get('delete-user/{userId}', 'FrontEndController@delete')->name('delete.user');
Route::get('activate-user/{userId}', 'FrontEndController@activate')->name('activate.user');
Route::get('force-delete-user/{userId}', 'FrontEndController@forceDelete')->name('force.delete.user');

});