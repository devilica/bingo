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
Auth::routes();

Route::middleware(['auth'])->group(function(){
        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/create/ticket', 'TicketController@create');
        Route::post('/store/ticket', 'TicketController@store');




        Route::prefix('admin')
            ->as('admin.')
            ->group(function() {
                Route::get('/home', 'Admin\AdminController@index')->name('home');
        Route::namespace('Auth\Login')
            ->group(function() {
            Route::get('login', 'AdminController@showLoginForm')->name('login');
            Route::post('login', 'AdminController@login')->name('login');
            Route::post('logout', 'AdminController@logout')->name('logout');
            });
        });

});