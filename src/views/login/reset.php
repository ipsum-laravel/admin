<?php echo Form::open(array('route' => 'admin.reset', 'autocomplete' => "off")); ?>
    <fieldset>
        <legend>Modification du mot de passe :</legend>

        <?php if (Session::has("alert_error")) : ?>
            <p class="textWarning center"><?= Session::get("alert_error") ?></p>
        <?php endif ?>
        <p>
            Pour entrer un nouveau mot de passe veuillez remplir ce formulaire :
        </p>
        <p>
            <?php echo Form::label('email', 'Email'); ?>
            <?php echo Form::text('email'); ?>
        </p>
        <p>
            <?php echo Form::label('password', 'Nouveau mot de passe'); ?>
            <?php echo Form::password('password'); ?>
        </p>
        <p>
            <?php echo Form::label('password_confirmation', 'Confirmation'); ?>
            <?php echo Form::password('password_confirmation'); ?>
        </p>
        <p class="submit">
            <?php echo Form::hidden('token', $token); ?>
            <?php echo Form::submit('Modifier'); ?>
        </p>
    </fieldset>
<?php echo Form::close(); ?>
<p class="baspage"><?php echo link_to_action('admin.login', 'Se connecter') ?></p>