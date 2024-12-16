/**
 * Layout : Header
*
* Permet de changer le skin du header
*/


// Permet de gérer la class .e-scrll-dwn du Header
let previousPosition = window.scrollY + 1;

export const headerUpdateSkin = (e) => {
  if ($header) {
    // Récupère la position du scroll
    const scrollY = e.detail.scrollY;

    // Changement de skin du header si scroll
    if (scrollY > 10) {
      $header.classList.add('e-scrll');
    }
    else {
      $header.classList.remove('e-scrll');
    };

    // Affiche ou cache le header si scroll top or down
    if (previousPosition > scrollY) {
      headerShow();
    } else {
      headerHide();
    };

    // Mémorise la position actuel du scroll
    previousPosition = scrollY;
  }
}


// Affiche ou cache le layout

export const headerShow = () => {
  if ($header) {
    $header.classList.remove('e-scrll-dwn');
    document.body.classList.remove('e-scrll-dwn');
  }
}

export const headerHide = () => {
  if ($header) {
    $header.classList.add('e-scrll-dwn');
    document.body.classList.add('e-scrll-dwn');
  }
}

// Initialise le layout

let $header;
export const headerInit = () => {
  $header = document.querySelector('.l-hdr');

  // Cache le header si l'overlay s'ouvre
  document.removeEventListener('mOverlayHide', headerHide);
  document.addEventListener('mOverlayHide', headerHide);

  // Modifie le header en fonction du scroll
  document.removeEventListener('windowIsScroll', headerUpdateSkin);
  document.addEventListener('windowIsScroll', headerUpdateSkin);

  // Affiche le header si top = 0
  document.removeEventListener('windowIsTop', headerShow);
  document.addEventListener('windowIsTop', headerShow);
}
headerInit();