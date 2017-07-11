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
        Route::get('/component-detail/{any}', '\Distilleries\Integration\Http\Controllers\Frontend\IntegrationController@getComponentDetail');
        Route::get('/component', '\Distilleries\Integration\Http\Controllers\Frontend\IntegrationController@getComponent');
        Route::get('/', '\Distilleries\Integration\Http\Controllers\Frontend\IntegrationController@getPageListe');
        Route::get('/pages/{any}', '\Distilleries\Integration\Http\Controllers\Frontend\IntegrationController@getPage');
    });
}
