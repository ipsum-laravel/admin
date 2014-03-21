<?php
namespace Ipsum\Admin\Controllers;

use View;
use Input;
use Redirect;
use Auth;
use Validator;
use Ipsum\Admin\Models\User;

class LoginController extends \BaseController {

    public $layout = 'IpsumAdmin::layouts.login';
    public $menu = null;


    public function login()
    {
        if (Auth::check()) {
            return Redirect::route("admin");
        }

        $this->layout->title = 'Connexion';
        $this->layout->content = View::make('IpsumAdmin::login.connexion');
    }

    public function postLogin()
    {
        $validation = Validator::make(
            Input::only('email', 'password'),
            array(
                'email' => 'required',
                'password' => 'required',
            )
        );

        if ($validation->passes()) {
            return (Auth::attempt(Input::only('email', 'password') , Input::has('cookie'))) ? Redirect::intended(route('admin'))
                    : Redirect::back()->with("alert_error" , "Erreur de connexion");
        }
        return Redirect::back()->with("alert_error" , "Merci de renseigner l'identifiant et le mot de passe");
    }

    public function logout()
    {

        Auth::logout();
        return Redirect::route("admin.login")->with("alert_error" , "Vous êtes bien déconnecté");
    }

}