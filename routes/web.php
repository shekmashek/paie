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
/* Route::get('sign-in', function () {
    /* return redirect()->away('http://127.0.0.1:8000/sign-in'); */
/* })->name('sign-in'); */

Route::get('/', 'HomeController@index')->name('home');

Route::get('condition_generale_de_vente', 'ConditionController@index')->name('condition_generale_de_vente');

Route::get('/logout',function(){
    Auth::logout();
})->name('logout');

Route::get('get_types', 'CreationFicheController@get_types')->name('get_types');
Route::get('get_designations_code', 'CreationFicheController@designations_code')->name('get_designations_code');
Route::get('get_designations', 'CreationFicheController@designations')->name('get_designations');


