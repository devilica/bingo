<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){

    Route::get('/admin/register', 'RegisterController@showAdminRegistrationForm');
    Route::post('/admin/register', 'RegisterController@registerAdmin');


    Route::get('/create/location', 'LocationController@create');
    Route::post('/store/location', 'LocationController@store');
    Route::get('/show/locations', 'LocationController@seeLocations');
    Route::get('/show/tickets', 'AdminController@seeTickets');



});