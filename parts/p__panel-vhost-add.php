<?php

// Ce fichier permet de gérer l'affichage du volet
// de modification d'un vhost

?>

<section id="m-pnl-03" class="m-pnl p-pnl-add m-pnl-r m-flx">
    <div class="m-mdl-dkns">
        <div class="m-mdl-dkn">
            <div class="e-dnks">
                <ul class="e-dnk m-flx" data-speed="0.5">
                    <li>
                        <span class="m-display m-s"><i><?= __('Add a virual host') ?></i></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="m-pnl-wrp m-rom m-flc m-flyc m-flg05">
        <div class="m-flc m-flyc">
            <span class="m-lead m-c"><?= __('Coming soon') ?></span>
            <span class="m-body-l m-txt-g m-c"><?= __('WampMono is still under development.<br>This feature will be available soon.') ?></span>

            <div class="m-flc m-flxc m-mt1">
                <a href="http://localhost/add_vhost.php" class="m-btn m-btn-p" target="_blank">
                    Use Default UI
                </a>
            </div>
        </div>


        <form class="m-frm m-flc e-hde">
            <div class="m-frm-wrp m-flc">
                <div class="m-frm-grp m-row m-flx m-flxc m-flg1">
                    <div class="m-frm-lbl">
                        <label for="vhost-url"><?= __('New virtual host URL') ?></label>
                        <input type="text" name="vhost-url" placeholder="<?= __('New virtual host URL') ?>" value="" required>
                    </div>
                    <span class="m-btn m-btn-p m-btn-ico m-mta"><?= get_ico('help'); ?></span>
                </div>

                <div class="m-frm-swt-wrp m-frm-grp m-row m-flx m-flxc">
                    <span class="m-body m-txt-g m-mta"><?= __('Automatically creates a new folder in /www') ?></span>
                    <label class="m-frm-swt m-mla m-mta">
                        <input id="p-inp-ctms" type="checkbox" checked>
                        <span class="m-frm-sld m-flx m-flxc e-fll"></span>
                    </label>
                </div>

                <div class="m-frm-grp m-row m-flx m-flxc e-hde">
                    <div class="m-frm-lbl">
                        <label for="vhost-path"><?= __('New virtual host path') ?></label>
                        <input type="hidden" name="vhost-path" placeholder="<?= __('New virtual host path') ?>" value="" required>
                    </div>
                    <span class="m-btn m-btn-p m-btn-ico m-mta"><?= get_ico('help'); ?></span>
                </div>

                <div id="p-pnl-ctms" class="m-frm-grp m-row m-flx m-flxc m-flg1 e-hde">
                    <div class="m-frm-lbl">
                        <label for="vhost-custom-path"><?= __('New virtual host custom path') ?></label>
                        <input type="text" name="vhost-custom-path" placeholder="<?= __('New virtual host custom path') ?>" value="" required>
                    </div>
                    <span class="m-btn m-btn-p m-btn-ico m-mta"><?= get_ico('help'); ?></span>
                </div>

                <div class="m-frm-swt-wrp m-frm-grp m-row m-flx m-flxc">
                    <span class="m-body m-txt-g m-mta"><?= __('Show advanced options') ?></span>
                    <label class="m-frm-swt m-mla m-mta">
                        <input id="p-inp-adv" type="checkbox">
                        <span class="m-frm-sld m-flx m-flxc e-fll"></span>
                    </label>
                </div>

                <div id="p-pnl-adv" class="l-ftp-empt m-flc m-flg05 m-flxc m-flyc m-mt2 e-hde">
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
                <button class="m-btn m-btn-p m-pnl-btn m-mla" data-vltid="m-pnl-03"><?= __('Cancel') ?></button>
                <button type="submit" class="m-btn m-btn-p"><?= __('Add Vhost') ?></button>
            </div>
        </form>
    </div>
</section>