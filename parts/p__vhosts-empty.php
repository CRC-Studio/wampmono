<?php

// Ce fichier permet de gérer l'affichage d'une div
// lorsque l'utilisateur n'a aucun vhost

?>

<div class="l-ftp-empt m-flc m-flg05 m-flxc m-flyc">
    <span class="m-lead m-c"><?= __('No virtual hosts found') ?></span>
    <p class="m-body m-c m-txt-g"><?= __("WampMono didn’t detect any virtual host.<br>You can create one to start working on your projects.") ?></p>
    <a class="m-btn m-btn-p m-pnl-btn m-mt1" data-vltid="m-pnl-03">
        <?= __('Add a new Vhost') ?>
    </a>
</div>