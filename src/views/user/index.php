<h2>Liste des utilisateurs (<?= $liste->count() ?>)</h2>
<?= $liste->pagination() ?>
<form method="get" id="recherche" action="">
    <div>
        <?= $liste->paramsListe(true) ?>
        <input type="text" name="mot" id="mot" value="<?= $liste->getRechercheValue('mot') ?>" />
        <input type="submit" name="submit" value="Chercher" />
    </div>
</form>
<table class="liste" width="75%">
    <thead>
        <tr>
            <th><?= $liste->labelTri('nom', 'Nom') ?></th>
            <th><?= $liste->labelTri('email', 'Email') ?></th>
            <th>Modif.</th>
            <th>Supp.</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; foreach ($datas as $data): ?>
            <tr class="<?= (($i %2 ) == 0 ? "pair" : "impair"); ?>">
                <td><?= e($data->nom) ?></td>
                <td><?= e($data->email) ?></td>
                <td class="center"><a href="<?= route('admin.user.edit', array('id' => $data->id)) ?>"><img src="<?= asset('packages/ipsum/admin/img/modifier.png') ?>" alt="Modifier" /></a></td>
                <td class="center">
                    <?= Form::open(array('method' => 'DELETE', 'route' => array('admin.user.destroy', $data->id))) ?>
                        <div>
                            <input type="image" src="<?= asset('packages/ipsum/admin/img/supprimer.png') ?>" value="Supprimer" class="supprimer" data-message="<?= e($data->nom) ?>">
                        </div>
                    <?= Form::close() ?>
                </td>
           </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
<?= $liste->pagination() ?>
