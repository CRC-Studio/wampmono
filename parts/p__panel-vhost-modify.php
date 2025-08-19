<?php

// Ce fichier permet de gérer l'affichage du volet
// de modification d'un vhost

?>

<section id="m-pnl-02" class="m-pnl m-pnl-r m-flx">
    <div class="m-mdl-dkns">
        <div class="m-mdl-dkn">
            <div class="e-dnks">
                <ul class="e-dnk m-flx" data-speed="0.5">
                    <li>
                        <span class="m-display m-s"><i><?= __('Modify a virual host') ?></i></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="m-pnl-wrp m-rom m-flc m-flyc m-flg05">
        <div class="m-flc m-flyc e-hde">
            <span class="m-lead m-c"><?= __('Coming soon') ?></span>
            <span class="m-body-l m-txt-g m-c"><?= __('WampMono is still under development.<br>This feature will be available soon.') ?></span>

            <div class="m-flc m-flxc m-mt1">
                <a href="http://localhost/add_vhost.php" class="m-btn m-btn-p" target="_blank">
                    Use Default UI
                </a>
            </div>
        </div>


        <form class="m-frm m-flc">
            <div class="m-frm-wrp m-flc">
                <div class="m-frm-grp m-row m-flx m-flxc m-flg1">
                    <div class="m-frm-lbl">
                        <label for="vhost-url"><?= __('Virtual host URL') ?></label>
                        <input type="text" name="vhost-url" placeholder="<?= __('New virtual host URL') ?>" value="" required>
                    </div>
                    <span class="m-btn m-btn-p m-btn-ico m-mta"><?= get_ico('help'); ?></span>
                </div>

                <div class="m-frm-grp m-row m-flx m-flxc">
                    <div class="m-frm-lbl">
                        <label for="vhost-path"><?= __('Virtual host path') ?></label>
                        <input type="text" name="vhost-path" placeholder="<?= __('New virtual host path') ?>" value="" required>
                    </div>
                    <span class="m-btn m-btn-p m-btn-ico m-mta"><?= get_ico('help'); ?></span>
                </div>

                <div class="m-frm-swt-wrp m-frm-grp m-row m-flx m-flxc">
                    <span class="m-body m-txt-g m-mta"><?= __('Show advanced options') ?></span>
                    <label class="m-frm-swt m-mla m-mta">
                        <input id="p-inp-mod-adv" type="checkbox">
                        <span class="m-frm-sld m-flx m-flxc e-fll"></span>
                    </label>
                </div>

                <div id="p-pnl-mod-adv" class="l-ftp-empt m-flc m-flg05 m-flxc m-flyc m-mt2 e-hde">
                    <span class="m-body m-c"><?= __('Coming soon') ?></span>
                    <span class="m-body m-txt-g m-c"><?= __('WampMono is still under development.<br>This feature will be available soon.') ?></span>
                    <div class="m-flc m-flxc m-mt1">
                        <a href="http://localhost/add_vhost.php" class="m-btn m-btn-p" target="_blank">
                            Use Default UI
                        </a>
                    </div>
                </div>
            </div>

            <div class="m-frm-grp m-flx m-flg05 m-mta">
                <button class="m-btn m-btn-p m-pnl-btn m-mla" data-vltid="m-pnl-02"><?= __('Cancel') ?></button>
                <button type="submit" class="m-btn m-btn-p"><?= __('Save') ?></button>
            </div>
        </form>
    </div>
</section>