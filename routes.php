<?php
//definim les rutes
return [
    '/' => 'App/Controllers/LandingController@index',
    '/index.php' => 'App/Controllers/LandingController@index',
    '/index' => 'App/Controllers/LandingController@index',
    '/home' => 'App/Controllers/LandingController@index',

    // Rutes per a films
    '/films' => 'App/Controllers/FilmController@index',
    '/films/create' => 'App/Controllers/FilmController@create',
    '/films/store' => 'App/Controllers/FilmController@store',
    '/films/edit' => 'App/Controllers/FilmController@edit',
    '/films/update' => 'App/Controllers/FilmController@update',
    '/films/delete' => 'App/Controllers/FilmController@delete',
    '/films/destroy' => 'App/Controllers/FilmController@destroy',
    '/films/show' => 'App/Controllers/FilmController@show',

    // Rutes per a games
    '/games' => 'App/Controllers/GameController@index',
    '/games/create' => 'App/Controllers/GameController@create',
    '/games/store' => 'App/Controllers/GameController@store',
    '/games/edit' => 'App/Controllers/GameController@edit',
    '/games/update' => 'App/Controllers/GameController@update',
    '/games/delete' => 'App/Controllers/GameController@delete',
    '/games/destroy' => 'App/Controllers/GameController@destroy',
    '/games/show' => 'App/Controllers/GameController@show',
];
