            <?php foreach ($rubriques as $groupe) : ?>
            <div class="groupe">
                <ul>
                    <?php foreach ($groupe as $key => $rubrique) : ?>
                    <li class="<?= $rubrique['selected'] ?>">
                        <a href="<?= isset($rubrique['url']) ? $rubrique['url'] : route($rubrique['route']) ?>" >
                            <img src="<?= asset($rubrique['icone_path']) ?>" alt="<?= e($rubrique['nom']) ?>" width="40" height="40" />
                            <br /><?= $rubrique['abreviation'] ?>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endforeach ?>