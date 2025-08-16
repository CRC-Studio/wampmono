<?php

// Ce fichier permet de gérer l'affichage d'une div
// contenant les vhosts de l'utilisateur

?>

<div class="l-ftp-vhosts m-flc">
    <h2 class="m-body m-txt-g m-mt3 m-mb1"><?= $letter ?></h2>
    <ul class="m-flc m-flg05">
        <?php foreach ($vhosts as $vhost): ?>
            <li class="l-ftp-vhost m-row m-flx m-flxc m-flg1">
                <a href="<?= $vhost['url'] ?>" target="_blank" class="m-flx m-lead e-txtsble"><?= $vhost['name'] ?></a>
                <?php if (get_vhost_login_url($vhost)): ?>
                    <a href="<?= get_vhost_login_url($vhost) ?>" target="_blank" class="m-btn m-btn-p m-btn-ico m-mla e-hde">
                        <?= get_ico('login') ?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>