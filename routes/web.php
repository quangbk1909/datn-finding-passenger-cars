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
    return view('pages.home');
});

Route::get('/search-coach', function () {
    return view('pages.searching_coach');
});


Route::group(['prefix' => 'coach'], function() {

    Route::get('/search', 'CoachController@searchCoach');
    Route::get('/{id}', 'CoachController@show');

});

Route::group(['prefix' => 'organization'], function() {

    Route::get('/{id}', 'OrganizationController@show');

});