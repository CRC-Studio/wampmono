<?php

// La page index.php est la première page a être chargée
// au lancement du site.


/**
 * Ajoute du Header
 */
include  __DIR__ . '/header.php';
?>


<main class="main l-ftp" role="main">

  <section class="m-rom">
    <div class="m-flc">
      <h1 class="m-title">MonoWamp</h1>
      <span class="m-body-l">A WampManager by <a href="https://crc.studio/" title="Meet CRC Studio ● Our design &amp; developement studio" target="_blank">CRC Studio</a></span>
    </div>
  </section>

  <section class="m-rom m-flr m-flg2">
    <div>
      <h2 class="m-lead">Tools<h2>
          <ul class="m-flc">
            <?php
            $alias = get_alias();
            foreach ($alias as $aliasData) {
              echo "<li><a href='{$aliasData['url']}' class='m-body'>{$aliasData['name']}</a></li>";
            }
            ?>
          </ul>
    </div>

    <div>
      <h2 class="m-lead">Virtual Hosts<h2>
          <ul class="m-flc">
            <?php
            $vhosts = get_virtualhosts();
            foreach ($vhosts as $vhost) {
              echo "<li><a href='{$vhost['url']}' class='m-body'>{$vhost['name']}</a></li>";
            }
            ?>
          </ul>
    </div>
  </section>

  <?php
  /**
   * Ajoute du Footer
   */
  include  __DIR__ . '/footer.php';
  ?>