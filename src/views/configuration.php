<h2>Configuration</h2>
<?php foreach ($menu_configuration as $configuration) : ?>
<?php if (!isset($configuration['zone']) or Auth::user()->hasAcces($configuration['zone'])) : ?>
<div class="bloc_left" style="width: 306px">
    <h3><?php echo $configuration['nom'] ?></h3>
    <table class="detail" >
        <?php foreach ($configuration['smenus'] as $smenu) : ?>
        <?php if (!isset($smenu['zone']) or Auth::user()->hasAcces($smenu['zone'])) : ?>
        <tr>
            <th style="width: 240px;"><?php echo $smenu['nom'] ?></th>
            <td><?= link_to_route($smenu['route'], 'éditer') ?></td>
        </tr>
        <?php endif ?>
        <?php endforeach ?>
    </table>
</div>
<?php endif ?>
<?php endforeach ?>
