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
      <form class="m-rom m-frm m-flx m-flg1">

        <a href="http://localhost/?wampmono=no" class="m-btn m-btn-p m-btn-ico m-mta m-ttip-lnk" target="_blank">
          <?= get_ico('arrow_left'); ?>
          <div class="m-ttip m-ttip__is--tl">
            <div class="m-ttip-wrp m-body-s"><?= __('Back to Wamp') ?></div>
          </div>
        </a>
        <div class="m-row m-frm-grp m-flx m-flxc">

          <div class="l-ftp-inp">
            <div class="m-frm-lbl">
              <label for="vhost"><?= __('Filter virtual hosts') ?></label>
              <input type="text" name="vhost" placeholder="<?= __('Filter virtual hosts') ?>" class="m-sch-inp" autofocus>
            </div>
          </div>
        </div>
        <div class="m-btn-bar m-mta">
          <a class="m-btn m-btn-ico m-ttip-lnk m-pnl-btn" data-vltid="m-pnl-03">
            <?= get_ico('more'); ?>
            <div class="m-ttip m-ttip__is--tl">
              <div class="m-ttip-wrp m-body-s"><?= __('Add a new Vhost') ?></div>
            </div>
          </a>

          <span href="" class="m-btn m-btn-ico m-ttip-lnk">
            <?= get_ico('notif'); ?>
            <?php

            $diff = get_update_diff();

            if ($diff === false): ?>
              <div class="m-ttip m-ttip__is--tl">
                <div class="m-ttip-wrp m-body-s"><?= __('Everything is quiet') ?></div>
              </div>
            <?php else: ?>
              <div class="m-ttip m-ttip__is--tl">
                <div class="m-ttip-wrp m-flc">
                  <span class="m-body m-mb1"><?= __('Updates available:') ?></span>
                  <?php foreach ($diff as $key => $info): ?>
                    <span class="m-body-s m-txt-g"><?= $key ?> <?= $info['latest'] ?></span>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="e-ntf"></div>
            <?php endif; ?>
          </span>
        </div>
      </form>
    </div>
  </section>


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