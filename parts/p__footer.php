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
      <span class="m-body-s"><a href="https://github.com/crc-Studio/wampmono" target="_blank"><i class="e-txtsble">WampMono™</i></a>, a light Manager for <a href="https://wampserver.aviatechno.net/" target="_blank" class="e-txtsble">Wampserver</a></span>
      <span class="m-body-s">by <a href="https://crc.studio/" title="Meet CRC Studio ● Our design &amp; developement studio" target='_blank' class="e-txtsble">crc.studio:</a></span>
      <span class="m-body-s">A design & developement studio</span>
      <span class="m-body-s">グラフィックデザインとプログラミング</span>
      <span class="m-body-s">Contact us: <a href="mailto:hello@crc.studio" target="_blank" title="Contact us at hello@crc.studio" class="e-txtsble">hello@crc.studio</a></span>
    </div>
  </div>

</footer>

</body>

</html>