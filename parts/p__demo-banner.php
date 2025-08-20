<?php

// Ce fichier permet de gérer l'affichage
// de la bannière du mode demo


// Vérifie si Wampmono est en mode Demo
if (!WAMPMONO_DEMO_MODE) {
  return;
}
?>


<section class="l-dem-ban m-rox m-flx m-flg1 m-flxc m-top">
  <a href="http://lab.crc.studio/tooltoys/wampmono" class="m-btn m-btn-ico m-ttip-lnk">
    <?= get_ico('arrow_left'); ?>
  </a>
  <span class="m-body-l"><?= __('Demo Mode: no real actions will be performed.'); ?></span>
  <span class="m-body-l m-mla"><?= __('Enable MonoWamp'); ?></span>

  <div class="m-frm-swt-wrp m-frm-grp m-flx m-flxc">
    <label class="m-frm-swt">
      <input id="p-inp-adv" type="checkbox" checked>
      <span class="m-frm-sld m-flx m-flxc e-fll"></span>
    </label>
  </div>
</section>