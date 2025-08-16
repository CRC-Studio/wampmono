<?php

// Ce fichier permet de gérer l'affichage
// de chaque tool de l'utilsateur

?>

<a href="<?= get_tool_url($tool) ?>" target="_blank" class="l-ftp-lnk m-flx m-flg05 e-txtsble">
    <span class="m-body m-txt-g e-txtsble-tar"><?= get_tool_title($tool) ?></span>
    <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
</a>