<?php

// La page index.php est la première page a être chargée
// au lancement du site.

// Ajoute le fichier de fonctions
include('fonctions.php');

// Ajoute le Head
include  __DIR__ . '/parts/p__head.php';
?>


<main class="main l-ftp" role="main">

  <?php // Ajout le beandeau de demo
  include  __DIR__ . '/parts/p__demo-banner.php';
  ?>

  <?php // Ajout la barre de recherches
  include  __DIR__ . '/parts/p__navbar.php';
  ?>


  <?php // Ajout le wrapper principal
  ?>

  <section class="l-ftp-wrp m-wrpc-s">
    <div class="m-rom m-flx m-flgmx">


      <div class="m-row m-flc e-obo">
        <?php // Ajout des Virtual Hosts
        $vhostsGrouped = get_vhosts();
        include __DIR__ . '/parts/' . ($vhostsGrouped ? 'p__vhosts.php' : 'p__vhosts-empty.php');
        ?>
      </div>


      <div class="l-ftp-asd m-flx m-mla">
        <ul class="l-ftp-acds m-row m-acds m-flc m-flg05">

          <?php // Ajout des Projets sans Virtual Hosts
          ?>

          <li class="l-ftp-flds m-acd m-flc e-off">
            <div class="m-acd-ttl  m-row m-flx m-flyc">
              <h2 class="m-lead"><?= __('Folders') ?></h2>
              <div class="m-acd-ico m-flx m-flyc m-flxc m-mla">
                <?= get_ico('arrow_right') ?>
              </div>
            </div>
            <div class="m-acd-wrp">
              <div class="m-flc m-flg05">
                <?php
                $projects = get_projects();
                include __DIR__ . '/parts/' . ($projects ? 'p__projects.php' : 'p__projects-empty.php');
                ?>
              </div>
            </div>
          </li>

          <?php // Ajout des Outils
          ?>

          <li class="l-ftp-lnks m-acd m-flc e-off">
            <div class="m-acd-ttl  m-row m-flx m-flyc">
              <h2 class="m-lead"><?= __('Tools') ?></h2>
              <div class="m-acd-ico m-flx m-flyc m-flxc m-mla">
                <?= get_ico('arrow_right') ?>
              </div>
              <div id="l-ftp-mdy" class="m-flx m-flyc m-flxc m-mla m-pnl-btn e-hde" data-vltid="m-pnl-01">
                <?= get_ico('settings'); ?>
              </div>
            </div>
            <div class="m-acd-wrp">
              <div class="m-flc m-flg05">
                <?php
                $tools = get_tools();
                include __DIR__ . '/parts/' . ($tools ? 'p__tools.php' : 'p__tools-empty.php');
                ?>
              </div>
            </div>
          </li>


        </ul>
      </div>
    </div>

  </section>

  <?php
  /**
   * Ajoute les volets
   */
  include  __DIR__ . '/parts/p__panel-tools.php';
  include  __DIR__ . '/parts/p__panel-vhost-add.php';
  include  __DIR__ . '/parts/p__panel-vhost-modify.php';
  ?>

  <?php
  /**
   * Ajoute du Footer
   */
  include  __DIR__ . '/parts/p__footer.php';
  ?>