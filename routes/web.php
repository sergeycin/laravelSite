<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function()
{
    return view('auth.login');
});

Route::get('/myblog/{page?}', 'App\Http\Controllers\BlogController@index');

Auth::routes();

Route::get('/home', function()
{
    return view('home');
});

 Route::view('/redactor', 'redactor')->middleware('auth')->name('redactor');

 Route::view('/load', 'load')->middleware('auth')->name('load');


/*  Route::get('/redactor', function()
{
    return view('redactor');
});  */

//Route::post('/redactor', 'BlogController@store');
Route::post('/redactor', [\App\Http\Controllers\BlogController::class, 'store']);


/* Route::get('/load', function()
{
    return view('load');
});
 */

Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'save']);

Route::post('/load', 'BlogController@load');