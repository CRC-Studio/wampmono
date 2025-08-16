<?php

// Ce fichier permet de gérer l'affichage du volet
// de modification des liens

?>

<section id="m-vlt-01" class="m-vlt m-vlt-r m-flx">
    <div class="m-mdl-dkns">
        <div class="m-mdl-dkn">
            <div class="e-dnks">
                <ul class="e-dnk m-flx" data-speed="0.5">
                    <li>
                        <span class="m-display m-s"><i><?= __('Edit tools') ?></i></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="m-vlt-wrp m-flc m-rom">
        <form class="m-frm m-flc m-flh" action="<?= get_home_url(); ?>/fonctions/s__set-tools.php" method="post">
            <div class="m-frm-lnks m-frm-wrp m-flc m-flh">
                <?php
                // Ajoute le lien 0 pour servir de template
                // lors de l'ajout d'un lien
                $tool = [
                    "TITLE" => "",
                    "URL" => "",
                    "ORDER" => 0
                ];
                include __DIR__ . '/p__volet-tools-single.php';

                // Ajoute les liens de l'utilisateur
                foreach (get_tools() as $tool) include __DIR__ . '/p__volet-tools-single.php';
                include __DIR__ . '/p__volet-tools-empty.php';
                ?>
            </div>
            <div class="m-frm-grp m-flx m-flg05 m-mta">
                <button class="m-btn-add m-btn m-btn-p m-mra"><?= __('New tool') ?></button>
                <button class="m-btn m-btn-p m-vlt-btn" data-vltid="m-vlt-01"><?= __('Cancel') ?></button>
                <button type="submit" class="m-btn m-btn-p"><?= __('Save') ?></button>
            </div>
        </form>
    </div>
</section>