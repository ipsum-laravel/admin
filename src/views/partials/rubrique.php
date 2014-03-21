            <?php foreach ($rubriques as $groupe) : ?>
            <div class="groupe">
                <ul>
                    <?php foreach ($groupe as $key => $rubrique) : ?>
                    <li class="<?= $rubrique['selected'] ?>">
                        <a href="<?= route($rubrique['route']) ?>" >
                            <img src="<?= asset('packages/ipsum/admin/img/'.$rubrique['icone']) ?>" alt="<?= e($rubrique['nom']) ?>" width="40" height="40" />
                            <br /><?= $rubrique['abreviation'] ?>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endforeach ?>