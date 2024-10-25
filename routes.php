<?php
//definim les rutes
return [
    '/' => 'App/Controllers/LandingController@index',
    '/index.php' => 'App/Controllers/LandingController@index',
    '/index' => 'App/Controllers/LandingController@index',
    '/home' => 'App/Controllers/LandingController@index',
    '/films'=> 'App/Controllers/FilmController@index',
    '/create' => 'App/Controllers/FilmController@create',
    '/store' => 'App/Controllers/FilmController@store',
    '/edit' => 'App/Controllers/FilmController@edit',
    '/update' => 'App/Controllers/FilmController@update',
    '/delete' => 'App/Controllers/FilmController@delete',
    '/destroy' => 'App/Controllers/FilmController@destroy',
    '/show' => 'App/Controllers/FilmController@show',
];