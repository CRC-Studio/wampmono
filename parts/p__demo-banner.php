<?php

// Ce fichier permet de gérer l'affichage
// de la bannière du mode demo


// Vérifie si Wampmono est en mode Demo
if (!WAMPMONO_DEMO_MODE) {
  return;
}
?>


<section class="l-ftp-dem m-row m-top">
  <span class="m-lead"><?= __('Demo Mode. No real actions will be performed.'); ?></span>
  <span class="m-lead m-mla"><?= __('Enable MonoWamp'); ?></span>
</section>