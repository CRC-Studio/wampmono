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
          <div class="l-ftp-inp">
            <div class="m-frm-lbl">
              <label for="vhost">Rechercher un virtual hosts</label>
              <input type="text" name="vhost" placeholder="Rechercher un virtual hosts" autofocus>
            </div>
          </div>
          <a href="http://localhost/add_vhost.php?lang=french" class="m-btn m-btn-p m-btn-ico m-mta" target="_blank"><?php the_ico('more'); ?></a>
        </div>
      </form>
    </div>

    <div class="m-rom m-flx m-flg2">

      <?php // Ajout des Virtual Hosts
      ?>

      <div class="m-row m-flx">
        <ul class="m-row m-flc e-obo">
          <?php
          $vhostsGrouped = get_virtualhosts();

          foreach ($vhostsGrouped as $letter => $vhosts): ?>
            <h2 class="m-body m-txt-g m-mt3 m-mb1"><?= $letter ?></h2>
            <ul class="m-flc m-flg05">
              <?php foreach ($vhosts as $vhost): ?>
                <li class="m-row">
                  <a href="<?= $vhost['url'] ?>" target="_blank" class="m-flx m-lead e-txtsble"><?= $vhost['name'] ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endforeach; ?>
        </ul>
      </div>


      <ul class="l-ftp-asd m-acds m-flc m-flg05 m-mla">

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
                <a href="<?= $projectData['url'] ?>" target="_blank" class="l-ftp-url m-flx m-flg05">
                  <span class="m-body m-txt-g"><?= $projectData['name'] ?></span>
                  <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
                </a>
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
              <a href="https://road.crc.studio/" target='_blank' class="l-ftp-url m-flx m-flg05">
                <span class="m-body m-txt-g">Roadmapper</span>
                <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
              </a>
              <a href="http://localhost/nadine/" target='_blank' class="l-ftp-url m-flx m-flg05">
                <span class="m-body m-txt-g">Nadine</span>
                <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
              </a>
              <a href="http://localhost/phpmyadmin/" target='_blank' class="l-ftp-url m-flx m-flg05">
                <span class="m-body m-txt-g">phpMyAdmin</span>
                <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
              </a>
              <a href="https://wampserver.aviatechno.net/" target='_blank' class="l-ftp-url m-flx m-flg05">
                <span class="m-body m-txt-g">WampUpdate</span>
                <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
              </a>
            </div>
          </div>
        </li>


      </ul>
    </div>

    <?php // Ajout du fake-footer
    ?>

    <div class="m-rom">
      <div class="m-flc">
        <span class="m-body-s"><i>MonoWamp™</i>, a light Manager for <a href="https://wampserver.aviatechno.net/" target="_blank">Wampserver</a></span>
        <span class="m-body-s">by <a href="https://crc.studio/" title="Meet CRC Studio ● Our design &amp; developement studio" target='_blank'>CRC Studio:</a></span>
        <span class="m-body-s">A design & developement studio</span>
        <span class="m-body-s">グラフィックデザインとプログラミング</span>
      </div>
    </div>
  </section>

  <?php
  /**
   * Ajoute du Footer
   */
  include  __DIR__ . '/templates/t__footer.php';
  ?>