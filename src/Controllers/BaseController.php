<?php
namespace Ipsum\Admin\Controllers;

use View;
use Input;
use Redirect;
use Config;
use Ipsum\Admin\Models\User;

class BaseController extends \BaseController {

    public $layout = 'IpsumAdmin::layouts.admin';
    public $menu = null;
    public static $zone;

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('authAdmin');
        $this->beforeFilter('csrf', array('on' => array('post')));
        
        Config::set('view.pagination', 'IpsumAdmin::partials.pagination');
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }

        if (isset($this->title)) {
            $this->layout->title = $this->title;
        }
        if (isset($this->rubrique)) {
            $this->layout->rubrique = $this->rubrique;
        }
        $this->layout->menu = $this->menu;
    }

    public function getIndex()
    {
        $groupes = Config::get('IpsumAdmin::menu');
        foreach ($groupes as $groupe) {
            foreach ($groupe as $menu) {
                if (\Auth::user()->hasAcces($menu['zone'])) {
                    $url = isset($menu['url']) ? $menu['url'] : route($menu['route']);
                    return Redirect::away($url);
                }
            }
        }
        \App::abort(403);
    }

    public function configuration()
    {
        $configuration = Config::get('IpsumAdmin::configuration');

        $this->layout->rubrique = 'configuration';
        $this->layout->menu = 'configuration';
        $this->layout->title = 'Configuration';
        $this->layout->content = View::make('IpsumAdmin::configuration', array('menu_configuration' => $configuration));
    }

}
