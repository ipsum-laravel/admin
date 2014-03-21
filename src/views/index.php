<h2>Liste des actualités (<?= $liste->count() ?>)</h2>
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
            <th><?= $liste->labelTri('date_actu', 'Date') ?></th>
            <th><?= $liste->labelTri('nom', 'Titre') ?></th>
            <th><?= $liste->labelTri('description', 'Description') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; foreach ($datas as $data): ?>
            <tr class="<?= (($i %2 ) == 0 ? "pair" : "impair") ?>">
                <td><?= $data->date_actu_format; ?></td>
                <td><?= e($data->nom) ?></td>
                <td><?= e($data->description) ?></td>
           </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>
<?= $liste->pagination() ?>
