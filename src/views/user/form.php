<h2><?= isset($data) ? 'Modification' : 'Nouvelle' ?> utilisateur</h2>
<?= Form::open(array('route' => isset($data) ? array('admin.user.update', $data->id) : 'admin.user.store', 'class' => 'saisie', 'method' => isset($data) ? 'PUT' : 'POST')) ?>
    <fieldset class="bloc_left">
        <legend>Description</legend>
        <p class="oblig<?= $errors->has('nom') ? ' form_erreur' : '' ?>">
            <?= Form::label('nom', 'Nom') ?>
            <?= Form::text('nom', isset($data) ? $data->nom : null) ?>
        </p>
        <p>
            <?= Form::label('prenom', 'Prénom') ?>
            <?= Form::text('prenom', isset($data) ? $data->prenom : null) ?>
        </p>
        <p class="oblig<?= $errors->has('email') ? ' form_erreur' : '' ?>">
            <?= Form::label('email', 'Email') ?>
            <?= Form::text('email', isset($data) ? $data->email : null) ?>
        </p>
        <p class="<?= $errors->has('password') ? ' form_erreur' : '' ?>">
            <span class="textNotice">Laisser vide pour conserver l'ancien</span>
            <?= Form::label('password', 'Mot de passe') ?>
            <?= Form::password('password') ?>
        </p>
        <p>
            <?= Form::label('password_confirmation', 'Confirmation mot de passe') ?>
            <?php echo Form::password('password_confirmation') ?>
        </p>
        <?php if ($role) : ?>
        <p class="oblig<?= $errors->has('role') ? ' form_erreur' : '' ?>">
            <?= Form::label('role', 'Rôle') ?>
            <?= Form::select('role', $role, isset($data) ? $data->role : null) ?>
        </p>
        <?php endif ?>
        <p>
            <label for="submit">&nbsp</label>
            <?= Form::submit('Enregistrer', array('id' => 'submit', 'class' => 'submit')) ?>
        </p>
    </fieldset>
    <?php if ($zones) : ?>
    <fieldset class="bloc_right">
        <legend>Zones d'accès</legend>
        <p>
            <?php foreach ($zones as $key => $zone) : ?>
            <label style="width:70%" for="zone<?= $key ?>"><?= e($zone) ?></label>
            <span class="checkbox" style="width:10%">
                <input
                    type="checkbox"
                    value="<?= $key ?>"
                    name="zone[]"
                    id="zone<?= $key ?>"
                    <?php echo (isset($data) and $data->acces() and in_array($key, $data->acces())) ? 'checked="checked"' : '' ?> />
            </span>
            <?php endforeach ?>
        </p>
    </fieldset>
    <?php endif ?>
<?= Form::close() ?>
