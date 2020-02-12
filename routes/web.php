<?php

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

Route::get('/','ArtController@index' );

Route::view('/about','about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->group(function(){
    Route::resource('art','ArtController');

    Route::resource('interest','InterestController')->except(
        [
            'edit','update','show'
        ]
        );
});

Route::resource('user','UserController')->only(['show']);

Route::get('/add_to_interest/{id}','InterestController@create');


