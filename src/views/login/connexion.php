<?php echo Form::open(array('route' => 'admin.login')); ?>
    <fieldset>
        <legend>Veuillez vous identifier</legend>

        <?php if (Session::has("alert_error")) : ?>
            <p class="textWarning center"><?= Session::get("alert_error") ?></p>
        <?php endif ?>

        <p>
            <?php echo Form::label('email', 'Email'); ?>
            <?php echo Form::text('email'); ?>
        </p>

        <p>
            <?php echo Form::label('password', 'Mot de passe'); ?>
            <?php echo Form::password('password'); ?>
        </p>
        <p class="cookie">
            <label for="cookie">Mémoriser mes informations sur cet ordinateur.</label>
            <input type="checkbox" id="cookie" name="cookie" value="OK" />
        </p>
        <p class="submit">
            <?php echo Form::submit('Connexion'); ?>
        </p>
    </fieldset>
<?php echo Form::close(); ?>
<p class="baspage"><?php echo link_to_route('admin.remind', 'Mot de passe oublié') ?></p>