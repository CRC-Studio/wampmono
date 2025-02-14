<?php

// La page index.php est la première page a être chargée
// au lancement du site.


/**
 * Ajoute du Header
 */

include  __DIR__ . '/templates/t__head.php';
?>

<main class="main l-ftp" role="main">

  <?php // Ajout la barre de recherches
  ?>

  <section class="l-ftp-top m-row">
    <div class="m-wrpc-s m-flx m-flg1">
      <form class="m-rom m-frm m-flx">
        <div class="m-row m-frm-grp m-flx m-flxc m-flg1">

          <a href="http://localhost/?wampmono=no" class="m-btn m-btn-p m-btn-ico m-mta m-ttip-lnk" target="_blank">
            <?php the_ico('arrow_left'); ?>
            <div class="m-ttip m-ttip__is--tl">
              <div class="m-ttip-wrp m-body-s"><?= _('Back to Wamp') ?></div>
            </div>
          </a>

          <div class="l-ftp-inp">
            <div class="m-frm-lbl">
              <label for="vhost"><?= _('Filter virtual hosts') ?></label>
              <input type="text" name="vhost" placeholder="<?= _('Filter virtual hosts') ?>" class="m-sch-inp" autofocus>
            </div>
          </div>

          <a href="http://localhost/add_vhost.php?lang=french" class="m-btn m-btn-p m-btn-ico m-mta m-ttip-lnk">
            <?php the_ico('more'); ?>
            <div class="m-ttip m-ttip__is--tl">
              <div class="m-ttip-wrp m-body-s"><?= _('Add a new Vhost') ?></div>
            </div>
          </a>

        </div>
      </form>
    </div>
  </section>


  <?php // Ajout le wrapper principal
  ?>

  <section class="l-ftp-wrp m-wrpc-s">
    <div class="m-rom m-flx m-flg2">

      <?php // Ajout des Virtual Hosts
      ?>

      <div class="m-row m-flc e-obo">
        <?php
        $vhostsGrouped = get_vhosts();

        foreach ($vhostsGrouped as $letter => $vhosts): ?>
          <div class="l-ftp-vhosts m-flc">
            <h2 class="m-body m-txt-g m-mt3 m-mb1"><?= $letter ?></h2>
            <ul class="m-flc m-flg05">
              <?php foreach ($vhosts as $vhost): ?>
                <li class="l-ftp-vhost m-row m-flx m-flxc m-flg1">
                  <a href="<?= $vhost['url'] ?>" target="_blank" class="m-flx m-lead e-txtsble"><?= $vhost['name'] ?></a>
                  <?= get_vhost_login_url($vhost) ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>


      <ul class="l-ftp-asd m-acds m-flc m-flg05 m-mla">

        <?php // Ajout des Projets sans Virtual Hosts
        ?>

        <li class="m-acd m-flc">
          <div class="m-acd-ttl">
            <h2 class="m-lead"><?= _('Folders') ?></h2>
            <div class="m-acd-ico">
              <?php the_ico('more') ?>
            </div>
          </div>
          <div class="m-acd-wrp">
            <div class="l-ftp-lnks m-flc m-flg05">
              <?php
              $projects = get_projects();
              foreach ($projects as $projectData): ?>
                <a href="<?= $projectData['url'] ?>" target="_blank" class="l-ftp-lnk m-flx m-flg05">
                  <span class="m-body m-txt-g">/<?= $projectData['name'] ?></span>
                  <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
                </a>
              <?php endforeach ?>

            </div>
          </div>
        </li>

        <?php // Ajout des Outils
        ?>

        <li class="m-acd m-flc e-on">
          <div class="m-acd-ttl">
            <h2 class="m-lead"><?= _('Tools') ?></h2>
            <div class="m-acd-ico">
              <?php the_ico('more') ?>
            </div>
          </div>
          <div class="m-acd-wrp">
            <div class="l-ftp-lnks m-flc m-flg05">
              <a href="https://app.keeweb.info/" target='_blank' class="l-ftp-lnk m-flx m-flg05">
                <span class="m-body m-txt-g">KeeWeb</span>
                <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
              </a>
              <a href="http://localhost/nadine/" target='_blank' class="l-ftp-lnk m-flx m-flg05">
                <span class="m-body m-txt-g">Nadine</span>
                <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
              </a>
              <a href="http://localhost/phpmyadmin/" target='_blank' class="l-ftp-lnk m-flx m-flg05">
                <span class="m-body m-txt-g">phpMyAdmin</span>
                <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
              </a>
              <a href="https://road.crc.studio/" target='_blank' class="l-ftp-lnk m-flx m-flg05">
                <span class="m-body m-txt-g">Roadmapper</span>
                <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
              </a>
              <a href="https://wampserver.aviatechno.net/" target='_blank' class="l-ftp-lnk m-flx m-flg05">
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