<?php

return array(
    array(
        'nom' => 'PARAMETRES SYSTEME',
        'smenus' => array(
            array(
                'nom' => 'Gestion des administrateurs',
                'route' => 'admin.user',
            ),
            array(
                'nom' => 'Gestion des paramètres',
                'route' => 'admin.parametre',
                'zone' => 'admin',
            ),
            array(
                'nom' => 'Gestion des erreurs',
                'route' => 'admin.log',
                'zone' => 'superAdmin',
            ),
        ),
    ),
    /*array(
        'nom' => 'GESTION DU SITE',
        'zone' => '',
        'smenus' => array(
            array(
                'nom' => 'Gestion des catégories',
                'route' => 'admin',
                'zone' => 'categorie',
            ),
        ),
    ),*/
);