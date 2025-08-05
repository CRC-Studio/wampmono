<?php

// Ce fichier permet de gérer l'affichage d'une div
// lorsque l'utilisateur n'a aucun vhost

?>

<div class="l-ftp-empt m-flc m-flg05 m-flxc m-flyc">
    <span class="m-lead">No virtual hosts found</span>
    <p class="m-body m-c m-txt-g">Wampmono didn’t detect any virtual host. <br>You can create one to start working on your projects.</p>
    <a href="http://localhost/add_vhost.php?lang=french" class="m-btn m-btn-p m-mt1">
        <?= _('Add a new Vhost') ?>
    </a>
</div>