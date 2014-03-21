<?php echo Form::open(array('route' => 'admin.remind')); ?>
    <fieldset>
        <legend>Mot de passe oublié</legend>

        <?php if (Session::has("alert_error")) : ?>
            <p class="textWarning center"><?= Session::get("alert_error") ?></p>
        <?php endif ?>

        <p>
            <?php echo Form::label('email', 'Email'); ?>
            <?php echo Form::text('email'); ?>
        </p>
        <p class="submit">
            <?php echo Form::submit('Récupèrer'); ?>
        </p>
    </fieldset>
<?php echo Form::close(); ?>
<p class="baspage"><?php echo link_to_route('admin.login', 'Se connecter') ?></p>