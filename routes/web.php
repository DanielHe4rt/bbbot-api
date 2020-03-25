<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/votes','VotesController@getVotes');
$router->post('/vote','VotesController@postVote');
$router->get('/config','ConfigController@getData');
$router->get('/symbols/{symbol}','SymbolController@getSymbol');
