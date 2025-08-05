<?php

// Ce fichier permet de gérer l'affichage d'un lien
// dans le volet de modification des liens

?>

<div id="lnk-<?= get_link_order($link) ?>" class="m-frm-lnk m-flx m-flg1">
    <button class="m-btn-drg m-btn m-btn-p m-btn-ico m-mta" data-id="lnk-<?= get_link_order($link) ?>"><?= get_ico('drag'); ?></button>
    <div class="m-frm-grp m-row m-flx m-flxc">
        <div class="m-frm-lbl">
            <label for="url-<?= get_link_order($link) ?>">URL</label>
            <input type="text" name="url-<?= get_link_order($link) ?>" placeholder="URL" value="<?= get_link_url($link) ?>">
        </div>
        <div class="m-frm-lbl">
            <label for="title-<?= get_link_order($link) ?>">Title</label>
            <input type="text" name="title-<?= get_link_order($link) ?>" placeholder="Title" value="<?= get_link_title($link) ?>">
        </div>
    </div>
    <button class="m-btn-sup m-btn m-btn-p m-btn-ico m-mta" data-id="lnk-<?= get_link_order($link) ?>"><?= get_ico('less'); ?></button>
</div>