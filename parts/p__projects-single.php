<?php

// Ce fichier permet de gérer l'affichage
// d'un projet

?>

<a href="<?= $projectData['url'] ?>" target="_blank" class="l-ftp-lnk m-flx m-flg05 e-txtsble">
    <span class="m-body m-txt-g e-txtsble-tar">/<?= $projectData['name'] ?></span>
    <span class="l-ftp-ico m-mta e-off"><?= get_ico('arrow_top_right'); ?></span>
</a>