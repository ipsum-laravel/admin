<?php


/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('authAdmin', function()
{
    if (Auth::guest()) return Redirect::guest(route('admin.login'));

    // Check accès au controleur
    $controleur = strstr(Route::currentRouteAction(), '@', true);
    if (!Auth::user()->hasAcces($controleur::$zone)) {
        App::abort(403);
    }
});

Route::filter('authSuperAdmin', function()
{
    if (Auth::guest()) return Redirect::guest(route('admin.login'));

    if (!Auth::user()->isSuperAdmin()) {
        return Redirect::route('admin')->with('error', "Vous n'avez pas accès à cette page");
    }
});


/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
    if (Session::token() != Input::get('_token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
