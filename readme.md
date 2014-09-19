# Installation du package d'administration d'Ipsum

## Modification des fichiers de config

Les fichiers de configuration de votre package peuvent être copiés dans le dossier app/config/packages/ipsum/admin où ils peuvent être modifiés en toute sécurité.

    php artisan config:publish ipsum/admin

## Modification des assets (html/css/js)

    php artisan asset:publish ipsum/admin

## Authentification

TODO : voir pourquoi le fichier ipsum/admin/src/config/auth n'est pas pris en compte (table plus model)

Actuelement il faut modifier le fichier dans app/config/auth

Login admin : admin@example.com / admin

## Créations des tables

    php artisan migrate --package="ipsum/admin"

## Population des tables

Actuelement impossible de la faire via le package
Mettre les fichier dans le repertoire seed

    php artisan db:seed

