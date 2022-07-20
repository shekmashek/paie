<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/{paginations?}','HomeController@index')->name('employes.liste'); */
/* Route::get('/', 'HomeController@index')->name('profil_referent'); */
/* Route::middleware('auth:api')->get('/', function (Request $request) {
    echo 'eto';
    dd($request->user());
    return $request->user();
})->name('profil_referent'); */

Route::get('/api/user/{api_token?}', 'HomeController@index')->name('profil_referent');

Route::get('/', function () {
    return view('index_accueil');
})->name('accueil_perso');

Route::get('sign-in', function () {
    return view('auth.connexion');
})->name('sign-in');

Route::get('create-compte', function () {
    return view('create_compte.create_compte');
})->name('create-compte');

Route::get('/info_legale', function () {
    return view('/info_legale');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('contacts', function () {
    return view('contacts');
});

Route::get('/politique_confidentialite', function () {
    return view('/politique_confidentialite');
})->name('politique_confidentialite');

Route::get('/politique_confidentialites', function () {
    return view('/politique_confidentialites');
});
Route::get('/tarifs', function () {
    return view('/tarif');
});

Route::get('condition_generale_de_vente', 'ConditionController@index')->name('condition_generale_de_vente');
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


