<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::get('users', function (){
//    return 'users';
//});

//Route::get('users', '\App\Http\Controllers\UserController@index');
//Route::post('users', '\App\Http\Controllers\UserController@store');
//Route::get('users/{id}', '\App\Http\Controllers\UserController@show');
//Route::put('users/{id}', '\App\Http\Controllers\UserController@update');
//Route::delete('users/{id}', '\App\Http\Controllers\UserController@destroy');

//Route::apiResource('users', '\App\Http\Controllers\UserController');
Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::group(['middleware' => 'auth:api'], function () {

    // Profile
    Route::get('user', [UserController::class,'user']);
    Route::put('users/info', [UserController::class,'updateInfo']);
    Route::put('users/password', [UserController::class,'updatePassword']);

    // Users
    Route::apiResource('users', UserController::class);

    Route::apiResource('roles', RoleController::class);
});


