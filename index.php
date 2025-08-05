<?php

// La page index.php est la première page a être chargée
// au lancement du site.


/**
 * Ajoute du Header
 */

include  __DIR__ . '/parts/p__head.php';
?>

<main class="main l-ftp" role="main">

  <?php // Ajout la barre de recherches
  ?>

  <section class="l-ftp-top m-row e-off">
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

        if ($vhostsGrouped):
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
        <?php else: ?>
          <?php include  __DIR__ . '/parts/p__vhost-empty.php'; ?>
        <?php endif; ?>
      </div>


      <div class="l-ftp-asd m-acds m-flx m-mla">
        <ul class="l-ftp-acds m-acds m-flc m-flg05">

          <?php // Ajout des Projets sans Virtual Hosts
          ?>

          <li class="l-ftp-flds m-acd m-flc e-off">
            <div class="m-acd-ttl  m-row m-flx m-flyc">
              <h2 class="m-lead"><?= _('Folders') ?></h2>
              <div class="m-acd-ico m-flx m-flyc m-flxc m-mla">
                <?php the_ico('arrow_right') ?>
              </div>
            </div>
            <div class="m-acd-wrp">
              <div class="m-flc m-flg05">
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

          <li class="l-ftp-lnks m-acd m-flc e-off">
            <div class="m-acd-ttl  m-row m-flx m-flyc">
              <h2 class="m-lead"><?= _('Tools') ?></h2>
              <div class="m-acd-ico m-flx m-flyc m-flxc m-mla">
                <?php the_ico('arrow_right') ?>
              </div>
              <div id="l-ftp-mdy" class="m-flx m-flyc m-flxc m-mla m-vlt-btn e-hde" data-vltid="m-vlt-01">
                <?php the_ico('settings'); ?>
              </div>
            </div>
            <div class="m-acd-wrp">
              <div class="m-flc m-flg05">
                <?php foreach (get_links() as $link): ?>
                  <a href="<?= get_link_url($link) ?>" target="_blank" class="l-ftp-lnk m-flx m-flg05">
                    <span class="m-body m-txt-g"><?= get_link_title($link) ?></span>
                    <span class="l-ftp-ico m-mta e-off"><?php the_ico('arrow_top_right'); ?></span>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          </li>


        </ul>
      </div>
    </div>

  </section>

  <?php
  /**
   * Ajoute le volet de modification des liens
   */
  include  __DIR__ . '/parts/p__volet-links.php';
  ?>


  <?php
  /**
   * Ajoute du Footer
   */
  include  __DIR__ . '/parts/p__footer.php';
  ?>