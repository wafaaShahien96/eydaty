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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([

    'middleware' => 'api',
    'namespace' => 'Api'

], function ($router) {

    Route::group(['prefix' => 'user'], function () {

        Route::post('register', 'AuthController@register');
        Route::post('checkverificationcode', 'AuthController@checkverificationcode');
        Route::post('resendVcode', 'AuthController@resendVcode');
        Route::post('login', 'AuthController@login');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('logout', 'AuthController@logout');
        Route::post('userProfile', 'AuthController@UserProfile');
        Route::post('completeProfile', 'AuthController@completeProfile');
        Route::get('settings', 'MainController@settings');
        Route::get('pricings', 'MainController@pricing');
        Route::post('visit_request', 'MainController@visitRequest');
        Route::post('home-ex-request', 'MainController@HomeExRequest');
        Route::post('patientQuery', 'MainController@patientQuery');
        Route::get('visits', 'MainController@Visits');
        // Route::post('accepted', 'MainController@accepted');

        Route::group(['prefix' => 'password'], function () {
            Route::post('sendResetPasswordVCode', 'AuthController@sendResetPasswordVCode');
            Route::post('resendPasswordVCode', 'AuthController@resendPasswordVCode');
            Route::post('create_token', 'AuthController@CreateToken');
            Route::post('resetpassword', 'AuthController@resetpassword');
        });
    });
});
