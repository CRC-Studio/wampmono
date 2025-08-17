<?php

// Ce fichier permet de gérer l'affichage d'une div
// contenant les vhosts de l'utilisateur

?>

<div class="l-ftp-vhosts m-flc">
    <h2 class="m-body m-txt-g m-mt3 m-mb1"><?= $letter ?></h2>
    <ul class="m-flc m-flg05">
        <?php foreach ($vhosts as $vhost): ?>
            <li class="l-ftp-vhost m-row m-flx m-flxc m-flg1 m-men e-txtsble">
                <span class="m-lead e-txtsble-tar"><?= $vhost['name'] ?></span>

                <?php // Ajout de la barre d'outil 
                ?>

                <div class="l-ftp-btns m-btn-bar m-flx e-off">

                    <?php // Cherche la page /login
                    if (get_vhost_git_url($vhost)): ?>
                        <a href="<?= get_vhost_git_url($vhost) ?>" target="_blank" class="m-btn m-btn-p m-btn-ico">
                            <?= get_ico('logo_' . get_vhost_git_provider($vhost)) ?>
                        </a>
                    <?php endif; ?>

                    <?php // Cherche le repo git
                    if (get_vhost_login_url($vhost)): ?>
                        <a href="<?= get_vhost_login_url($vhost) ?>" target="_blank" class="m-btn m-btn-p m-btn-ico">
                            <?= get_ico('login') ?>
                        </a>
                    <?php endif; ?>
                    <span class="m-men-btn m-btn m-btn-p m-btn-ico">
                        <?= get_ico('more_vert') ?>
                    </span>
                </div>

                <ul class="m-men-itms">
                    <li class="m-men-itm m-body"><a class="m-pnl-btn" data-vltid="m-pnl-02"><?= __('Modify') ?></a></li>
                    <li class="m-men-itm m-body m-mdl-cls" data-mdl="cfr"><a><?= __('Delete') ?></a></li>
                </ul>

                <a href="<?= $vhost['url'] ?>" target="_blank" class="e-fll"></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>