<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Récupération de votre mot de passe</h2>

        <p>
            Pour récupérer votre mot de passe veuillez utiliser ce lien :<br>
            <?= link_to_route('admin.reset', null, array('token' => $token)) ?>
        </p>
    </body>
</html>
