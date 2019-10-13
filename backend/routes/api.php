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

Route::post('/login', 'LoginAPIController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/social/{provider}', 'AuthController@redirectToProvider');
Route::get('/social/{provider}/callback', 'AuthController@handleProviderCallback');

Route::middleware('api')->name('api.')->group(function(){
    Route::name('places.')->prefix('miejsca')->group(function(){
        Route::post('/w-obszarze','PlaceController@inArea')->name('inArea');
    });


    Route::name('qr.')->prefix('qry')->group(function(){
        Route::post('/wygeneruj','QrController@generate')->name('generate');
        Route::post('/zweryfikuj','QrController@verify')->name('verify');
    });

    Route::name('user.')->prefix('uzytkownik')->group(function(){
        Route::post('/dane','UserController@data')->name('data');
    });

    Route::name('bottle.')->prefix('butelki')->group(function(){
        Route::post('/','BottleController@getAll')->name('index');
    });

});
