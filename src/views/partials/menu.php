        <?php foreach ($menus as $menu) : ?>
        <div class="menu <?= $menu['selected'] ?>">
            <div class="onglet"><a href="<?= route($menu['route']) ?>"><?= e($menu['nom']) ?></a></div>
            <?php if(!empty($menu['smenus'])) : ?>
            <ul>
                <?php foreach ($menu['smenus'] as $smenu) : ?>
                <li><a href="<?= route($smenu['route']) ?>">
                    <img src="<?= asset('packages/ipsum/admin/img/'.$smenu['icone']) ?>" alt="<?= e($smenu['nom']) ?>" />
                    <?= e($smenu['nom']) ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif ?>
        </div>
        <?php endforeach ?>