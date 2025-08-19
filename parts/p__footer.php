<?php

// Ce fichier est le dernier a être exécuter lors de la construction
// des pages. C'est ici que tout s'arrête.

?>


<?php // Fin du <main>. Permet d'injecter des parts à la fin du main. 
?>
</main>

<footer class="l-fot">
  <?php // Module Overlay 
  ?>
  <div class="m-ovl e-fll e-off"></div>

  <?php // Ajout de la modale
  include  __DIR__ . '/p__modal-confirme.php'; ?>

  <?php // Ajout du fake-footer
  ?>

  <div class="l-fot-wrp m-wrpc-s e-off">
    <div class="m-rom m-flc">
      <span class="m-body-s">
        <a href="https://lab.crc.studio/tooltoys/wampmono" target="_blank" title="<?= __('WampMono by CRC Studio ● A lightweight UI manager for Wampserver') ?>">
          <i class="e-txtsble">WampMono</i>
        </a>, <?= __('a light Manager for') ?>
        <a href="https://wampserver.aviatechno.net/" target="_blank" class="e-txtsble" title="<?= __('Official Wampserver site ● Tools, updates & documentation') ?>">Wampserver</a>
      </span>
      <span class="m-body-s">
        <a href="https://github.com/crc-studio/wampmono" target="_blank" class="e-txtsble" title="<?= __('Explore the WampMono repository on GitHub') ?>">GitHub</a> ●
        <a href="http://forum.wampserver.com/" target="_blank" class="e-txtsble" title="<?= __('Join the Wampserver community forum for help & feedback') ?>">WampForum</a> ●
        <a href="https://wampserver.aviatechno.net/" target="_blank" class="e-txtsble" title="<?= __('Get the latest Wampserver updates and addons') ?>">WampUpdate</a>
      </span>
      <span class="m-body-s">
        <a href="https://wampserver.aviatechno.net/" target="_blank" class="e-txtsble" title="<?= __('Wampserver project timeline and legacy') ?>">Wampserver</a>: 2007 — <?= date('Y'); ?>
      </span>
    </div>
  </div>

</footer>

</body>

</html>