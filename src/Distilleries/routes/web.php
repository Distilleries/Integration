<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Route;

if (empty(config('integration.disabled', false))) {
    Route::group(['prefix' => config('integration.prefix_uri')], function (){
        Route::get('/', 'Frontend\IntegrationController@getIndex');
        Route::get('/component-detail/{any}', 'Frontend\IntegrationController@getComponentDetail');
        Route::get('/component', 'Frontend\IntegrationController@getComponent');
    });
}
