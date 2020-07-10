<?php

use Illuminate\Support\Facades\Route;
use App\User;

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

// $user = User::find(2);
// Auth::login($user);
// Auth::logout();

Route::get('/', 'OrganizationController@getHome');

Route::get('login','UserController@getLogin');
Route::post('login','UserController@postLogin');

Route::get('signup','UserController@getSignup');
Route::post('signup','UserController@postSignup');

Route::get('logout','UserController@logout');



Route::group(['prefix' => 'coach'], function() {

    Route::get('/search', 'CoachController@searchCoach');
    Route::get('/{id}', 'CoachController@show');
    Route::post('/search',"CoachController@postSearchCoach");
    Route::post('/rating/{id}','CoachController@postRating');
    Route::get('/follow/{id}', 'CoachController@follow');
    Route::get('/unfollow/{id}', 'CoachController@unfollow');


});

Route::group(['prefix' => 'organization'], function() {

    Route::get('/{id}', 'OrganizationController@show');
    Route::get('/{id}/coach/searching','OrganizationController@showWithCoachSearching');
    Route::get('/management/{id}', 'OrganizationController@getManagementView');
    Route::get('/{organizationID}/coach/update/{coachID}', 'OrganizationController@getUpdateCoach');
    Route::post('/{organizationID}/coach/update/{coachID}', 'OrganizationController@postUpdateCoach');
    Route::get('/{organizationID}/coach/update-status/{coachID}', 'OrganizationController@getUpdateStatusCoach');
    Route::post('/{organizationID}/coach/update-status/{coachID}', 'OrganizationController@postUpdateStatusCoach');
    Route::post('/{id}/coach/create', 'OrganizationController@postCreateCoach');
    Route::post('/{id}/staff/add', 'OrganizationController@addNewStaff');
    Route::get('/{organization_id}/staff/delete/{staff_id}', 'OrganizationController@deleteStaff');
    Route::get('/{organization_id}/coach/delete/{coach_id}','OrganizationController@deleteCoach');
    Route::post('/{id}/update/info','OrganizationController@postUpdateInfo');

    Route::get('/create/new','OrganizationController@getCreate');
    Route::post('/create/new','OrganizationController@postCreate');



});

Route::group(['prefix' => 'user'], function() {
    Route::get('/dashboard', 'UserController@showDashboard');
    Route::get('/schedule/create', 'UserController@getCreateSchedule');
    Route::post('/schedule/create','UserController@postCreateSchedule');
    Route::get('/schedule/detail/{id}', 'UserController@getDetailUserSchedule');

    Route::get('/schedule/update/{id}', 'UserController@getUpdateUserSchedule');
    Route::post('/schedule/update/{id}','UserController@postUpdateUserSchedule');
    Route::get('/schedule/delete/{id}','UserController@deleteUserSchedule');


    Route::get('/search','UserController@getSearchUserSchedule');
    Route::post('/search','UserController@postSearchUserSchedule');

    Route::post('car/create','UserController@postCreateCar');
    Route::post('car/update/{id}','UserController@postUpdateCar');

    Route::get('info/update','UserController@getUpdateInfo');
    Route::post('info/update','UserController@postUpdateInfo');

});

Route::group(['prefix' => 'car'], function() {
    Route::get('/search','UserController@getSearchCar');
    Route::post('/search','UserController@postSearchCar');
    Route::get('/schedule/{id}','UserController@showDriverSchedule');
    Route::post('/rating/{id}','UserController@postCarRating');

    
});

Route::group(['prefix' => 'driver'], function() {
    Route::get('/schedule/create', 'UserController@getCreateDriverSchedule');
    Route::post('/schedule/create','UserController@postCreateDriverSchedule');
    Route::get('/schedule/update/{id}', 'UserController@getUpdateDriverSchedule');
    Route::post('/schedule/update/{id}','UserController@postUpdateDriverSchedule');
    Route::get('/schedule/delete/{id}','UserController@deleteDriverSchedule');

});
Route::group(['prefix' => 'combine'], function() {
    Route::get('approve/{id}','UserController@approveCombine');
    Route::get('reject/{id}','UserController@rejectCombine');
    Route::get('cancel/{id}','UserController@cancelCombine');
    Route::get('complete/{id}','UserController@completeCombine');
});

Route::post('driver/request/{driver_schedule_id}','UserController@postRequestDriver');

Route::post('user/request/{user_schedule_id}','UserController@postRequestUser');


Route::get('notifications', 'UserController@getNotifications');
Route::get('notifications/markAsRead','UserController@markNotificationsAsRead');