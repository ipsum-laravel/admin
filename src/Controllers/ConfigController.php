<?php
namespace Ipsum\Admin\Controllers;

use Ipsum\Core\Models\Website;
use View;
use Input;
use Redirect;
use Session;
use Config;
use Auth;

class ConfigController extends BaseController {

    public $title = 'Gestion des paramètres';
    public $rubrique = 'configuration';
    public $menu = 'parametre';

    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('authAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $types = Website::types();
        $this->layout->content = View::make('IpsumAdmin::config', compact('types'));
    }


    /**
     * Update all the the website configuration
     *
     * @return Response
     */
    public function update()
    {
        foreach (Config::get('IpsumCore::website') as $key => $value) {
            if (Input::get($key) != $value) {
                Config::set('IpsumCore::website.'.$key, Input::get($key));
            }
        }
        Session::flash('success', "Les paramètres ont bien été modifiés");
        return Redirect::back();
    }

}
