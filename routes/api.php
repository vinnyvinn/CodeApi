<?php

use Illuminate\Http\Request;

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
Route::resource('users','User\UserController',['only' => ['index','store','show','update','destroy']]);
Route::resource('promocodes','Code\PromocodeController',['only' => ['index','store','show','update','destroy']]);
Route::resource('deactivate','Code\DeactivateCodeController',['only' => ['update']]);
Route::resource('activecodes','Code\ActiveCodesController',['only' => ['index']]);
Route::resource('tests','Code\TestValidityController', ['store']);
Route::resource('events','Code\EventController',['only' => ['index','show']]);
Route::resource('rides','Code\RideController',['only' => ['index','show']]);