<?php

// La page index.php est la première page a être chargée
// au lancement du site.


/**
 * Ajoute du Header
 */

include  __DIR__ . '/templates/t__head.php';
?>

<main class="main l-ftp" role="main">
  <section class="m-wrpc-s">
    <div class="m-rom m-flx m-flg1">
      <form class="m-row m-frm m-flx">
        <div class="m-row m-frm-grp m-flx m-flxc m-flg1">
          <div class="l-ftp-inp m-frm-wrp">
            <div class="m-frm-lbl">
              <label for="prenom">Rechecher</label>
              <input type="text" autofocus>
            </div>
          </div>
          <a href="http://localhost/add_vhost.php?lang=french" class="m-btn m-btn-p" target="_blank">Ajouter</a>
        </div>
      </form>
    </div>

    <div class="m-rom m-flx m-flg2">

      <?php // Ajout des Virtual Hosts
      ?>

      <div>
        <ul class="m-flc">
          <?php
          $vhostsGrouped = get_virtualhosts();

          foreach ($vhostsGrouped as $letter => $vhosts): ?>
            <h2 class='m-body m-my1'><?= $letter ?></h2>
            <ul>
              <?php foreach ($vhosts as $vhost): ?>
                <li>
                  <a href="<?= $vhost['url'] ?>" target="_blank" class="m-lead e-txtsble"><?= $vhost['name'] ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endforeach; ?>
        </ul>
      </div>


      <ul class="m-acds m-flc m-flg05 m-mla">

        <?php // Ajout des Projets sans Virtual Hosts
        ?>

        <li class="m-acd m-flc">
          <div class="m-acd-ttl">
            <h2 class="m-lead">Explorer</h2>
            <div class="m-acd-ico">
              <?php the_ico('more') ?>
            </div>
          </div>
          <div class="m-acd-wrp">
            <div class="m-flc m-flg05">
              <?php
              $projects = get_projects();
              foreach ($projects as $projectData): ?>
                <a href="<?= $projectData['url'] ?>" target="_blank" class="m-body"><?= $projectData['name'] ?></a>
              <?php endforeach ?>

            </div>
          </div>
        </li>

        <?php // Ajout des Outils
        ?>

        <li class="m-acd m-flc">
          <div class="m-acd-ttl">
            <h2 class="m-lead">Outils</h2>
            <div class="m-acd-ico">
              <?php the_ico('more') ?>
            </div>
          </div>
          <div class="m-acd-wrp">
            <div class="m-flc m-flg05">
              <a href="https://road.crc.studio/" target='_blank' class='m-body'>Roadmapper</a>
              <a href="http://localhost/nadine/" target='_blank' class='m-body'>Nadine</a>
              <a href="http://localhost/phpmyadmin/" target='_blank' class='m-body'>phpMyAdmin</a>
              <a href="https://wampserver.aviatechno.net/" target='_blank' class='m-body'>WampUpdate</a>
            </div>
          </div>
        </li>


      </ul>
    </div>

    <?php // Ajout du fake-footer
    ?>

    <div class="m-rom">
      <div class="m-flx">
        <span class="m-body-s"><i>MonoWamp™</i>, a light WampManager. <br>by <a href="https://crc.studio/" title="Meet CRC Studio ● Our design &amp; developement studio" target='_blank'>CRC Studio</a></span>
      </div>
    </div>
  </section>

  <?php
  /**
   * Ajoute du Footer
   */
  include  __DIR__ . '/templates/t__footer.php';
  ?>