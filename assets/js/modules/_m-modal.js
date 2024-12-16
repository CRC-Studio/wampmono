/**
* Module : Modal
*/


// Import les effets

import * as eFade from '../effets/_e-fade';


// Affiche la modal


export const modalShow = () => {
  $modal.classList.add('e-on');
  eFade.fadeIn($modal);

  // Dispatch l'event requestmOverlayShow
  document.dispatchEvent(new CustomEvent('requestmOverlayShow'));
};

// Masque la modal

export const modalHide = () => {

  $modal.classList.remove('e-on');
  eFade.fadeOut($modal);

  // Dispatch l'event modalHide
  document.dispatchEvent(new CustomEvent('modalHide'));
};


/**
* Initialise le module
*/

export let $modal;
export const modalInit = () => {
  // Sélectionne la modal
  $modal = document.querySelector('.m-mdl');

  // Ferme le volet si l'overlay est fermé
  document.removeEventListener('mOverlayHide', modalHide);
  document.addEventListener('mOverlayHide', modalHide);
};

// Relance la fonction après un Call Ajax
document.addEventListener('initAfterAjax', () => {
  modalInit();
});

// Initialisation
modalInit();
