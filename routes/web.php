<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/dash', function () {

//         return view('dashboard.includes.home');
// });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::namespace('Dashboard')->prefix('admin')->name('admin.')->group(function () {
            Route::namespace('Auth')->group(function () {
                //Login Routes
                Route::get('/login', 'LoginController@showLoginForm')->name('login');
                Route::post('/login', 'LoginController@login');
                Route::get('/logout', 'LoginController@logout')->name('logout');
            });
            Route::middleware('auth:doctor')->group(function () {
                Route::get('/', 'HomeController@index')->name('home');

                Route::resource('users', 'UserController')->except('show');
                Route::resource('settings', 'SettingsController');
                Route::resource('pricing', 'PricingController');
                Route::resource('patient_query', 'PatientQueryController');
                Route::resource('visit_request', 'VisitRequestController');
                Route::resource('home_ex_request', 'HomeExRequestController');
                Route::resource('visit', 'VisitController');
                Route::get('visit/create/{id}', 'VisitController@create')->name('visit.creation');
            });
        });
    }
);
