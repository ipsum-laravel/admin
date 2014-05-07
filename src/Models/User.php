<?php
namespace Ipsum\Admin\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Config;
use Ipsum\Core\Models\BaseModel;

class User extends BaseModel implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'utilisateur';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    public $timestamps = false;


    public static $rules = array (
        'password' => 'required|min:6|confirmed',
        'email' => array(
            'required',
            'email',
            'unique:utilisateur,email'
        ),
        'nom' => 'required',
        'role' => array(
            'required'
        ),
     );

    const SUPERADMIN = 1;

    const ADMIN = 2;


    /**
     * Retourne le rôle de l'utilisateur
     *
     * @return string
     */
    public function role()
    {
        $roles = Config::get('auth.roles');
        return isset($roles[$this->role]) ? $roles[$this->role] : '';
    }

    /**
     * Vérifie le rôle de l'utilisateur
     *
     * @param int $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role == $role;
    }

    /**
     * Vérifi que l'utilisateur est super administrateur
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->role == User::SUPERADMIN;
    }

    /**
     * Vérifi que l'utilisateur est administrateur ou super administrateur
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role == User::ADMIN or $this->role == User::SUPERADMIN;
    }

    /**
     * Retourne les zones d'accès de l'utilisateur
     *
     * @return array
     */
    public function acces()
    {
        return unserialize($this->acces);
    }

    /**
     * Retourne les zones d'accès de l'utilisateur
     *
     * @return string
     */
    public function accesToString()
    {
        return explode(', ', $this->acces());
    }

    /**
     * Vérifie l'accés de l'utilisateur à une zone
     *
     * @param string $zone
     * @return bool
     */
    public function hasAcces($zone)
    {
        return empty($zone)
            or ($this->acces() and in_array($zone, $this->acces()))
            or ($this->isAdmin() and $zone != 'superAdmin')
            or $this->isSuperAdmin();
    }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}