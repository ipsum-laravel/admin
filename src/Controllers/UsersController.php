<?php
namespace Ipsum\Admin\Controllers;

use Ipsum\Core\Library\Liste;
use View;
use Input;
use Redirect;
use Session;
use Str;
use Config;
use Validator;
use Hash;
use Auth;
use Ipsum\Admin\Models\User;

class UsersController extends BaseController {

    public $title = 'Gestion des utilisateurs';
    public $rubrique = 'configuration';
    public $menu = 'utilisateur';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
           return Redirect::route("admin.user.edit");
        }
        $data = array();

        $liste = new Liste();
        $recherche = array(
            'input'     => 'mot',
            'colonnes'      => array (
                'utilisateur.nom',
                'utilisateur.prenom',
                'utilisateur.email'
            )
        );
        $liste->setRecherche($recherche);
        $tri = array(
            'ordre'     => 'ASC',
            'colonne'  => 'id'
        );
        $liste->setTri($tri);
        $requete = array(
            'colonnes'  => 'utilisateur.id,
                            utilisateur.nom,
                            utilisateur.prenom,
                            utilisateur.email',
            'from'      => 'utilisateur'
        );
        $ressource = $liste->select($requete);

        $data['datas'] = array();
        foreach($ressource as $item) {
            $data['datas'][] = $item;
        }

        $data['liste'] = $liste;

        $this->layout->content = View::make('IpsumAdmin::user.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (!Auth::user()->isAdmin()) {
           return Redirect::route("admin.user.edit");
        }
        $role = Config::get('auth.roles');
        $zones = Config::get('auth.zones');
        if (!Auth::user()->isSuperAdmin()) {
            unset($role[User::SUPERADMIN]);
        }
        $this->layout->content = View::make('IpsumAdmin::user.form', compact("data", "role", "zones"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if (!Auth::user()->isAdmin()) {
           return Redirect::route("admin.user.edit");
        }
        $inputs = Input::all();
        $rules = User::$rules;
        if (!Auth::user()->isSuperAdmin()) {
            $rules['role'][] = 'not_in:'.User::SUPERADMIN;
        }
        $validation = Validator::make($inputs, $rules);

        if ($validation->passes()) {
            $data = new User;
            $data->nom = Input::get('nom');
            $data->prenom = Input::get('prenom');
            $data->email = Input::get('email');
            $data->password = Hash::make(Input::get('password'));;
            $data->role = Input::get('role');
            $data->acces = serialize(Input::get('zone'));
            if ($data->save()) {
                Session::flash('success', "L'enregistrement a bien été créé");
                return Redirect::route("admin.user");
            } else {
                Session::flash('error', "Impossible de créer l'enregistrement");
            }
        }
        return Redirect::back()->withInput()->withErrors($validation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $zones = $role = false;
        if (Auth::user()->isAdmin()) {
            $data = User::findOrFail($id);

            $role = Config::get('auth.roles');
            $zones = Config::get('auth.zones');
            if (!Auth::user()->isSuperAdmin()) {
                unset($role[User::SUPERADMIN]);
            }
        } else {
            $data = Auth::user();
        }
        $this->layout->content = View::make('IpsumAdmin::user.form', compact("data", "role", "zones"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if (Auth::user()->isAdmin()) {
            $data = User::findOrFail($id);;
        } else {
            $data = Auth::user();
        }
        $rules = User::$rules;

        $inputs = Input::all();
        // Modification des régles
        if (!Input::has('password')) {
            unset($rules['password']);
        }
        foreach ($rules['email'] as $key => $rule) {
            if (starts_with($rule, 'unique')) {
                $rules['email'][$key] = $rule.','.$data->id;
            }
        }
        if (!Auth::user()->isAdmin()) {
            unset($rules['role']);
        } elseif (!Auth::user()->isSuperAdmin()) {
            $rules['role'][] = 'not_in:'.User::SUPERADMIN;
        }

        $validation = Validator::make($inputs, $rules);

        if ($validation->passes()) {
            $data->nom = Input::get('nom');
            $data->prenom = Input::get('prenom');
            $data->email = Input::get('email');
            if (Input::has('password')) {
                $data->password = Hash::make(Input::get('password'));
            }
            if (Auth::user()->isAdmin()) {
                $data->role = Input::get('role');
                $data->acces = serialize(Input::get('zone'));
            }
            if ($data->save()) {
                Session::flash('success', "L'enregistrement a bien été modifié");
                return Redirect::route("admin.user");
            } else {
                Session::flash('error', "Impossible de modifier l'enregistrement");
            }
        }
        return Redirect::back()->withInput()->withErrors($validation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->isAdmin()) {
           return Redirect::route("admin.user.edit");
        }
        $data = User::findOrFail($id);
        if ($data->delete()) {
            Session::flash('warning', "L'enregistrement a bien été supprimé");
        } else {
            Session::flash('error', "Impossible de supprimer l'enregistrement");
        }
        return Redirect::back();
    }

}