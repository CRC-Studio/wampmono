<?php

// Ce fichier permet de gérer l'affichage du volet
// de modification des liens

?>

<div id="m-vlt-01" class="m-vlt m-vlt-r m-flc e-on">

    <span class="m-lead m-my3">Modify links</span>
    <form class="m-frm m-flc m-flh" action="" method="post">
        <div class="m-frm-wrp m-flc m-flh">
            <?php foreach (get_links() as $link): ?>
                <div id="lnk-<?= get_link_order($link) ?>" class="m-frm-grp m-flx m-flxc">
                    <div class="m-frm-lbl">
                        <label for="url-<?= get_link_order($link) ?>">URL</label>
                        <input type="text" name="url-<?= get_link_order($link) ?>" placeholder="URL" value="<?= get_link_url($link) ?>">
                    </div>
                    <div class="m-frm-lbl">
                        <label for="name-<?= get_link_order($link) ?>">Name</label>
                        <input type="text" name="name-<?= get_link_order($link) ?>" placeholder="Name" value="<?= get_link_title($link) ?>">
                    </div>
                    <button class="m-btn m-btn-p m-btn-ico m-btn-sup m-mta" data-id="lnk-<?= get_link_order($link) ?>"><?= get_ico('delete'); ?></button>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="m-frm-grp m-flx m-flg05 m-mta">
            <button class="m-btn m-btn-p m-mra">Add link</button>
            <button class="m-btn m-btn-p m-vlt-btn" data-vltid="m-vlt-01">Cancel</button>
            <button class="m-btn m-btn-p">Save</button>
        </div>
    </form>
</div>