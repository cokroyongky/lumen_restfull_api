<?php
/**
 * @Author: C Yongky Pranowo
 * @Date:   2019-11-30 14:35:00
 * @Last Modified by:   C Yongky Pranowo
 * @Last Modified time: 2020-01-02 14:36:37
 */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// JWT Login
$router->post(
    'auth/login', 
    [
       'uses' => 'AuthController@authenticate'
    ]
);
// END JWT

$router->group(
    ['middleware' => 'jwt.auth'], 
    function() use ($router) {

        // -- User REST --
        $router->get('/user', 'UserController@index');
        $router->get('/user/{id}', 'UserController@show');
        $router->post('/user', 'UserController@store');
        $router->put('/user/{id}', 'UserController@update');
        $router->delete('/user/{id}', 'UserController@destroy');    
        // -- End User REST --
        
        // -- Train REST --
        $router->get('/train/{id}', 'TrainController@show');
        $router->post('/train', 'TrainController@store');
        $router->put('/train/{id}', 'TrainController@update');
        $router->delete('/train/{id}', 'TrainController@destroy');    
        // -- End Train REST --

        // -- Class REST --
        $router->get('/class/{id}', 'ClassController@show');
        $router->post('/class', 'ClassController@store');
        $router->put('/class/{id}', 'ClassController@update');
        $router->delete('/class/{id}', 'ClassController@destroy');    
        // -- End Class REST --

        // -- Station REST --
        $router->get('/station/{id}', 'StationController@show');
        $router->post('/station', 'StationController@store');
        $router->put('/station/{id}', 'StationController@update');
        $router->delete('/station/{id}', 'StationController@destroy');    
        // -- End Station REST --

        // // -- Schedule REST --
        $router->get('/schedule/{id}', 'DTScheduleController@show');
        $router->post('/schedule', 'DTScheduleController@store');
        $router->put('/schedule/{id}', 'DTScheduleController@update');
        $router->delete('/schedule/{id}', 'DTScheduleController@destroy');    
        // // -- End Schedule REST --

        $router->get('/dt_transaksi', 'DTTransaksiController@index');
    }
);

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Can be access public
$router->get('/train', 'TrainController@index');
$router->get('/class', 'ClassController@index');
$router->get('/schedule', 'DTScheduleController@index');
$router->get('/station', 'StationController@index');