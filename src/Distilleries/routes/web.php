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

if (empty(config('integration.disabled', false))) {
    $router->group(['prefix' => config('integration.prefix_uri')], function () use ($router) {
        $router->get('/', 'Frontend\IntegrationController@getIndex');
        $router->get('/component-detail/{any}', 'Frontend\IntegrationController@getComponentDetail');
        $router->get('/component', 'Frontend\IntegrationController@getComponent');
    });
}
