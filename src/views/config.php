<h2>Paramètres</h2>
    <?= Form::open(array('route' => 'admin.parametre', 'class' => "saisie")) ?>
    <div class="bloc_left">
        <?php foreach ($types as $type) : ?>
        <fieldset class="bloc_left">
            <?php if ($type->type) : ?>
            <legend><?= $type->type ?></legend>
            <?php endif ?>
            <?php foreach ($type->parametres as $parametre) : ?>
                <p>
                    <?php if ($parametre->aide) : ?>
                    <span class="textNote"><?= $parametre->aide ?></span>
                    <?php endif ?>
                    <?= Form::label($parametre->key); ?>
                    <?= Form::text($parametre->key, $parametre->value, ['class' => $parametre->class]) ?>
                </p>
            <?php endforeach ?>
            <p>
                <label for="submit">&nbsp;</label>
                <?= Form::submit('Enregistrer', array('id' => 'submit', 'class' => 'submit')) ?>
            </p>
        </fieldset>
        <?php endforeach ?>
    </div>
<?= Form::close(); ?>
