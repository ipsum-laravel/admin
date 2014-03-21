<?php

/**
 * Affiche le menu des rubriques
 *
 */
HTML::macro("rubrique", function($rubrique_active, $views = 'IpsumAdmin::partials.rubrique') {

    $rubriques = Config::get('IpsumAdmin::menu');

    $datas = array();
    foreach ($rubriques as $key1 => $groupe) {
        foreach ($groupe as $key => $rubrique) {
            if (Auth::user()->hasAcces($rubrique['rubrique']) or $rubrique['rubrique'] == 'configuration') {
                $rubriques[$key1][$key]['selected'] = $rubrique_active == $rubrique['rubrique'] ? 'selected' : '';
                $datas[$key1][$key] = $rubriques[$key1][$key];
            }
        }
    }
    // Use render http://www.laravel-tricks.com/tricks/avoid-string-viewmake
    return View::make($views, array('rubriques' => $datas));
});

/**
 * Affiche le menu
 *
 */
HTML::macro("menu", function($rubrique_active, $menu_actif, $views = 'IpsumAdmin::partials.menu') {

    $rubriques = Config::get('IpsumAdmin::menu');

    $datas = array();
    foreach ($rubriques as $key => $groupe) {
        if(isset($groupe[$rubrique_active])) {
            foreach ($groupe[$rubrique_active]['menus'] as $key => $menu) {
                if ( ! (isset($menu['visibility']) and $menu['visibility'] == 'hidden') or $menu_actif == $key) {
                    $menu['selected'] = $menu_actif == $key ? 'selected' : '';
                    $datas[] = $menu;
                }
            }
            break;
        }
    }
    // Use render http://www.laravel-tricks.com/tricks/avoid-string-viewmake
    return View::make($views, array('menus' => $datas))->render();
});
