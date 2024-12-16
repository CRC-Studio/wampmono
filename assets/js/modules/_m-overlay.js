/**
* Module : Overlay
*/


// Import les effets

import * as eFade from '../effets/_e-fade';


// Affiche l'overlay


export const overlayShow = () => {
  document.body.classList.add('e-frz');
  document.documentElement.classList.add('e-frz');

  $overlay.classList.add('e-on');
  eFade.fadeIn($overlay);

  // Dispatch l'event mOverlayShow
  document.dispatchEvent(new CustomEvent('mOverlayShow'));
};

// Masque l'overlay

export const overlayHide = () => {

  $overlay.classList.remove('e-on');
  eFade.fadeOut($overlay);

  document.body.classList.remove('e-frz');
  document.documentElement.classList.remove('e-frz');

  // Dispatch l'event mOverlayHide
  document.dispatchEvent(new CustomEvent('mOverlayHide'));
};

// Initialise le module

export let $overlay;
export const overlayInit = () => {
  // Sélectionne l'overlay
  $overlay = document.querySelector('.m-ovl');

  if ($overlay) {
    // Ajoute un événement au click
    $overlay.removeEventListener('click', overlayHide);
    $overlay.addEventListener('click', overlayHide);

    // Ferme l'overlay si d'autres modules le demande
    document.removeEventListener('requestmOverlayHide', overlayHide);
    document.addEventListener('requestmOverlayHide', overlayHide);

    // Ouvvre l'overlay si d'autres modules le demande
    document.removeEventListener('requestmOverlayShow', overlayShow);
    document.addEventListener('requestmOverlayShow', overlayShow);
  };
};
overlayInit();