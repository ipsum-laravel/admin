<h2>Paramètres</h2>
<?= Form::open(array('route' => 'admin.parametre', 'class' => "saisie")) ?>
    <fieldset class="bloc_left">
        <legend>Site</legend>
        <?php foreach (Config::get('IpsumCore::website') as $key => $value) : ?>
        <p>
            <?= Form::label($key); ?>
            <?= Form::text($key, $value) ?>
        </p>
        <?php endforeach ?>
        <p>
            <label for="submit">&nbsp;</label>
            <?= Form::submit('Enregistrer', array('id' => 'submit', 'class' => 'submit')) ?>
        </p>
    </fieldset>
<?= Form::close(); ?>