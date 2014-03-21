<?php
namespace Ipsum\Admin\Controllers;

use View;
use Input;
use Redirect;
use Session;
use Auth;

class LogController extends BaseController {

    public $title = 'Gestion des logs';
    public $rubrique = 'configuration';
    public $menu = 'log';
    public $fichier_log = null;

    public function __construct()
    {
        $this->beforeFilter(function()
        {
            if (!Auth::user()->isSuperAdmin()) {
                return Redirect::route('admin')->with('error', "Vous n'avez pas accès à cette page");
            }
        });

        $this->fichier_log = storage_path().'/logs/laravel.log';
    }

    public function log()
    {
        $fp = fopen($this->fichier_log, "r+");
        $log = "";
        $size = filesize($this->fichier_log);
        if (!empty($size)) {
            $log = fread($fp, $size);
        }

        $this->layout->content = View::make('IpsumAdmin::log', array('log' => $log));
    }

    public function postLog()
    {
        if (Input::has('log')) {
            $fp = fopen($this->fichier_log, 'wb');
            fwrite($fp, Input::get('log'));
            fclose($fp);
            Session::flash('success', "Fichier enregistré");
        }
        return Redirect::back();
    }

}