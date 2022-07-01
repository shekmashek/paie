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

/* Route::get('/{paginations?}','HomeController@index')->name('employes.liste'); */
/* Route::get('/', 'HomeController@index')->name('profil_referent'); */
Route::get('sign-in', function () {
    /* return redirect()->away('http://127.0.0.1:8000/sign-in'); */
})->name('sign-in');

/* Route::middleware('auth:api')->get('/', function (Request $request) {
    echo 'eto';
    dd($request->user());
    return $request->user();
})->name('profil_referent'); */

Route::get('/api/user/{api_token?}', 'HomeController@index')->name('profil_referent');