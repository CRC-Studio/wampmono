<?php

// Ce fichier permet de gérer l'affichage
// de la modale de confirmation

?>

<div class="m-mdl m-flx e-off" data-mdl="cfr">
    <div class="m-mdl-dkns">
        <div class="m-mdl-dkn">
            <div class="e-dnks">
                <ul class="e-dnk m-flx" data-speed="0.5">
                    <li>
                        <span class="m-display m-s"><i><?= __('Warning'); ?></i></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-rom m-mdl-wrp m-flc m-flg2">
        <span class="m-lead m-c"><?= __("Confirm deletion?"); ?></span>
        <div class="m-flx m-flg05">
            <button id="m-mdl-no" class="m-row m-btn m-btn-o m-mdl-cls"><?= __("Cancel"); ?></button>
            <button id="m-mdl-yes" class="m-row m-btn m-btn-p"><?= __("Delete"); ?></button>
        </div>
    </div>
</div>