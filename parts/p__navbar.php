<?php

// Ce fichier permet de gérer l'affichage d'une div
// lorsque l'utilisateur n'a aucun projets

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

        <span class="m-btn m-btn-ico m-ttip-lnk">
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