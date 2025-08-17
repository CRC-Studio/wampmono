/**
* Module : panel
*/


export const panelHandleClick = (e) => {
  e.preventDefault();
  e.stopPropagation();

  // Selectionne le panel à ouvrir
  panelId = e.currentTarget.getAttribute('data-vltid');
  $panel = document.getElementById(panelId);

  // Affiche ou non le panel
  if ($panel.classList.contains('e-on')) {
    // Dispatch l'event requestmOverlayHide
    document.dispatchEvent(new CustomEvent('requestmOverlayHide'));
  } else {
    panelShow();
  }
}

// Affiche ou cache le module

export const panelShow = () => {
  panelHide();
  $panel.classList.add('e-on');

  // Modifie au besoin le btn Nav
  if ($panel.classList.contains('l-hdr-nav')) {
    let $navBtn = document.querySelector('.nav-btn');
    $navBtn.classList.add('e-on');
  }


  // Dispatch l'event requestmOverlayShow
  document.dispatchEvent(new CustomEvent('requestmOverlayShow'));
};

export const panelHide = () => {
  $panels.forEach($panel => {
    $panel.classList.remove('e-on');

    // Modifie au besoin le btn Nav
    if ($panel.classList.contains('l-hdr-nav')) {
      let $navBtn = document.querySelector('.nav-btn');
      $navBtn.classList.remove('e-on');
    }

  });
}


// Initialise le module

export let $panels, $panel, $panelBtns, panelId;
export const panelInit = () => {
  // Sélectionne les panels et les boutons
  $panels = document.querySelectorAll('.m-pnl');
  $panelBtns = document.querySelectorAll('.m-pnl-btn');

  $panelBtns.forEach($panelBtn => {
    $panelBtn.removeEventListener('click', panelHandleClick);
    $panelBtn.addEventListener('click', panelHandleClick);
  });

  // Ferme le panel si l'overlay est fermé
  document.removeEventListener('mOverlayHide', panelHide);
  document.addEventListener('mOverlayHide', panelHide);
}
panelInit();


// Ouvre le panel au chargement d'une page si le parametre mv est open

export const panelAutoShow = () => {

  const urlParams = new URLSearchParams(window.location.search);
  const mvParam = urlParams.get('mv');
  if (mvParam) {
    let panelId = 'm-pnl-' + mvParam;
    $panel = document.getElementById(panelId);
    panelShow();
  }
};
panelAutoShow();