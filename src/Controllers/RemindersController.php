<?php
namespace Ipsum\Admin\Controllers;

use View;
use Password;
use Lang;
use Redirect;
use Input;
use App;
use Hash;
use Validator;

class RemindersController extends \BaseController {

    public $layout = 'IpsumAdmin::layouts.login';
    public $menu = null;

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		$this->layout->title = 'Mot de passe perdu';
        $this->layout->content = View::make('IpsumAdmin::login.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
     */
    public function postRemind()
    {
	    $validator = Validator::make(
            Input::only('email'),
            array('email' => 'required|email')
        );

        if ($validator->fails()) {
            return Redirect::back()->with("alert_error" , "Merci de renseigner un email valide");
        }
		switch ($response = Password::remind(Input::only('email'), function($m) {
		    $m->subject('Initialisation de votre mot de passe');
		}))	{
			case Password::INVALID_USER:
				return Redirect::back()->with('alert_error', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->with('alert_error', Lang::get($response));
        }
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
    public function getReset($token = null)
    {
		if (is_null($token)) App::abort(404);

		$this->layout->title = 'Initialiser le mot de passe';
        $this->layout->content = View::make('IpsumAdmin::login.reset')->with('token', $token);
    }

    /**
     * Handle a POST request to reset a user's password.
     *
     * @return Response
     */
    public function postReset()
    {
        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);

            $user->save();
        });

        switch ($response)
        {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
                return Redirect::back()->with('alert_error', Lang::get($response));

            case Password::PASSWORD_RESET:
                return Redirect::route('admin.login')->with("alert_error" , "Le mot de passe a bien été modifié");
        }
    }
}

