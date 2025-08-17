<?php

// Ce fichier permet de gérer l'affichage d'un lien
// dans le volet de modification des liens

?>

<div id="lnk-<?= get_tool_order($tool) ?>" class="m-frm-lnk m-flx m-flg1" draggable="true">
    <span class="m-btn-drg m-btn m-btn-p m-btn-ico m-mta" data-id="lnk-<?= get_tool_order($tool) ?>"><?= get_ico('drag'); ?></span>
    <div class="m-frm-grp m-row m-flx m-flxc">
        <div class="m-frm-lbl">
            <label for="url-<?= get_tool_order($tool) ?>"><?= __('URL') ?></label>
            <input type="url" name="url-<?= get_tool_order($tool) ?>" placeholder="<?= __('URL') ?>" value="<?= get_tool_url($tool) ?>" required>
        </div>
        <div class="m-frm-lbl">
            <label for="title-<?= get_tool_order($tool) ?>"><?= __('Title') ?></label>
            <input type="text" name="title-<?= get_tool_order($tool) ?>" placeholder="<?= __('Title') ?>" value="<?= get_tool_title($tool) ?>" required>
        </div>
    </div>
    <span class="m-btn-sup m-btn m-btn-p m-btn-ico m-mta" data-id="lnk-<?= get_tool_order($tool) ?>"><?= get_ico('less'); ?></span>
</div>