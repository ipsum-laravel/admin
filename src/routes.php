<?php

Route::group(
    array(
        'prefix' => 'administration',
        'namespace' => '\Ipsum\Admin\Controllers'
    ),
    function() {
        /* Patterns */
        Route::pattern('id', '\d+');

        /* Login */
        Route::get("login", array(
            "as" => "admin.login",
            "uses" => "LoginController@login",
        ));
        Route::post("login", array(
            "as" => "admin.login",
            "uses" => "LoginController@postLogin",
        ));
        Route::get("forgot", array(
            "as" => "admin.forgot",
            "uses" => "LoginController@forgot",
        ));
        Route::get("logout", array(
            "as" => "admin.logout",
            "uses" => "LoginController@logout",
        ));

        /* Remind */
        Route::get("remind", array(
            "as" => "admin.remind",
            "uses" => "RemindersController@getRemind",
        ));
        Route::post("remind", array(
            "as" => "admin.remind",
            "uses" => "RemindersController@postRemind",
        ));
        Route::get("reset/{token}", array(
            "as" => "admin.reset",
            "uses" => "RemindersController@getReset",
        ));
        Route::post("reset", array(
            "as" => "admin.reset",
            "uses" => "RemindersController@postReset",
        ));

        /* Users */
        Route::get('user', array(
            'as'     => 'admin.user',
            'uses'   => 'UsersController@index'
        ));
        Route::get('user/create', array(
            'as'     => 'admin.user.create',
            'uses'   => 'UsersController@create'
        ));
        Route::post('user', array(
            'as'     => 'admin.user.store',
            'uses'   => 'UsersController@store'
        ));
        Route::get('user/{id}/edit', array(
            'as'     => 'admin.user.edit',
            'uses'   => 'UsersController@edit'
        ));
        Route::put('user/{id}', array(
            'as'     => 'admin.user.update',
            'uses'   => 'UsersController@update'
        ));
        Route::delete('user/{id}/destroy', array(
            'as'     => 'admin.user.destroy',
            'uses'   => 'UsersController@destroy'
        ));

        /* Dashboard */
        Route::get('/', array(
            'uses' => 'BaseController@getIndex',
            'as' => 'admin',
        ));

        /* Configuration */
        Route::get('configuration', array(
            'uses' => 'BaseController@configuration',
            'as' => 'admin.configuration',
        ));

        /* Paramètres */
        Route::get('parametre', array(
            'uses' => 'ConfigController@index',
            'as' => 'admin.parametre',
        ));
        Route::post('parametre', array(
            'uses' => 'ConfigController@update',
            'as' => 'admin.parametre',
        ));

        /* Logs */
        Route::get('log', array(
            'uses' => 'LogController@log',
            'as' => 'admin.log',
        ));
        Route::post('log', array(
            'uses' => 'LogController@postLog',
            'as' => 'admin.log',
        ));
    }
);

