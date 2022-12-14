<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::get('userProfile/{id}', 'App\Http\Controllers\AuthController@userProfile')->name('userProfile');
Route::post('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::get('getSurveyQuestions/{id}', 'App\Http\Controllers\SurveyController@index')->name('survey.questions');
Route::post('create/{id}', 'App\Http\Controllers\SurveyController@create')->name('survey.create');
Route::get('view/{id}', 'App\Http\Controllers\SurveyController@view')->name('survey.view');

Route::group([
    'namespace' => 'App\Http\Controllers'
], function () {
    Route::post('signout', 'AuthController@logout')->name('signout');
});