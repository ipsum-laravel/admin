<?php

// Configuration des rubriques
return array(
    'groupe1' => array(
        /*'actualite' => array(
            'rubrique' => 'actualite',
            'nom' => 'Actualités',
            'abreviation' => 'Actu.',
            'icone' => 'calendrier.png',
            'zone' => 'actualite',
            'route' => 'admin.actualite.index',
            'menus' => array(
                'actualite' => array(
                    'menu' => 'actualite',
                    'nom' => 'Actualités',
                    'route' => 'admin.actualite.index',
                    'smenus' => array(
                        array(
                            'nom' => 'Liste des actualités',
                            'route' => 'admin.actualite.index',
                            'icone' => 'table.png'
                        ),
                        array(
                            'nom' => 'Ajouter une actualité',
                            'route' => 'admin.actualite.create',
                            'icone' => 'add.png'
                        ),
                    ),
                ),
                'test' => array(
                    'menu' => 'test',
                    'nom' => 'test',
                    'route' => 'admin',
                ),
            ),
        ),*/
        'configuration' => array(
            'rubrique' => 'configuration',
            'nom' => 'Configuration',
            'abreviation' => 'Config.',
            'icone' => 'parametre.png',
            'zone' => '',
            'route' => 'admin.configuration',
            'menus' => array(
                'dashboard' => array(
                    'menu' => 'dashboard',
                    'nom' => 'Dashboard',
                    'route' => 'admin',
                    'visibility'=> 'hidden',
                ),
                'configuration' => array(
                    'menu' => 'configuration',
                    'nom' => 'Configuration',
                    'route' => 'admin.configuration',
                ),
                'parametre' => array(
                    'menu' => 'parametre',
                    'nom' => 'Paramètres',
                    'route' => 'admin.parametre',
                    'visibility'=> 'hidden',
                ),
                'log' => array(
                    'menu' => 'log',
                    'nom' => 'Fichier de log',
                    'route' => 'admin.log',
                    'visibility'=> 'hidden',
                ),
                'utilisateur' => array(
                    'menu' => 'utilisateur',
                    'nom' => 'Utilisateurs',
                    'route' => 'admin.user',
                    'visibility'=> 'hidden',
                    'smenus' => array(
                        array(
                            'nom' => 'Liste des utilisateurs',
                            'route' => 'admin.user',
                            'icone' => 'table.png'
                        ),
                        array(
                            'nom' => 'Ajouter une utilisateur',
                            'route' => 'admin.user.create',
                            'icone' => 'add.png'
                        ),
                    ),
                ),
            ),
        ),
    ),
);
