<?php

// Ce fichier permet de gérer l'affichage du volet
// de modification des liens

?>

<div id="m-vlt-01" class="m-vlt m-vlt-r m-flc">

    <span class="m-lead m-my3">Edit Links</span>
    <form class="m-frm m-flc m-flh" action="<?= get_home_url(); ?>/fonctions/s__set-links.php" method="post">
        <div class="m-frm-lnks m-frm-wrp m-flc m-flh">
            <?php
            // Ajoute le lien 0 pour servir de template
            // lors de l'ajout d'un lien
            $link = [
                "TITLE" => "",
                "URL" => "",
                "ORDER" => 0
            ];
            include __DIR__ . '/p__volet-link.php';

            // Ajoute les liens de l'utilisateur
            foreach (get_links() as $link) include __DIR__ . '/p__volet-link.php'; ?>
        </div>
        <div class="m-frm-grp m-flx m-flg05 m-mta">
            <button class="m-btn-add m-btn m-btn-p m-mra">New link</button>
            <button class="m-btn m-btn-p m-vlt-btn" data-vltid="m-vlt-01">Cancel</button>
            <button type="submit" class="m-btn m-btn-p">Save</button>
        </div>
    </form>
</div>