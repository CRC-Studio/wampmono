/**
* Module : Modal
*/


// Import les effets

import * as eFade from '../effets/_e-fade.js';


const modalToggle = (e) => {
  const $btn = e.currentTarget;
  const mdlName = $btn.getAttribute('data-mdl');
  if (!mdlName) return;


  const $modal = document.querySelector(`.m-mdl[data-mdl="${mdlName}"]`);
  if (!$modal) return;

  if ($modal.classList.contains('e-on')) {
    modalHide();
  } else {
    modalShow(mdlName);
  }

};


// Affiche la modal

export const modalShow = (mdlName) => {

  // Sélectionne la modal
  let $modal = document.querySelector(`.m-mdl[data-mdl="${mdlName}"]`);

  // Vérifier si la modale existe
  if ($modal) {
    $modal.classList.add('e-on');
    $overlay.classList.add('m-mdl-ovl');
    eFade.fadeIn($modal, 500);

    // Dispatch l'event requestmOverlayShow
    document.dispatchEvent(new CustomEvent('requestmOverlayShow'));
  }
};

// Masque la modal

export const modalHide = () => {

  $modals.forEach(($modal) => {
    $modal.classList.remove('e-on');
    $modal.style.opacity = '0';
    $modal.style.pointerEvents = 'none';
  });

  $overlay.classList.remove('m-mdl-ovl');

  // Dispatch l'event modalHide
  document.dispatchEvent(new CustomEvent('modalHide'));
};


/**
* Initialise le module
*/

export let $modals, $overlay;
export const modalInit = () => {
  // Sélectionne la modal
  $modals = document.querySelectorAll('.m-mdl');

  // Sélectionne l'overlay
  $overlay = document.querySelector('.m-ovl');

  // Ferme la modale si l'overlay est fermé
  document.removeEventListener('mOverlayHide', modalHide);
  document.addEventListener('mOverlayHide', modalHide);

  // Ajoute le listener sur les boutons de fermeture
  document.querySelectorAll('.m-mdl-cls').forEach(($btn) => {
    $btn.removeEventListener('click', modalToggle);
    $btn.addEventListener('click', modalToggle);
  });

  // Relance la fonction après un Call Ajax
  document.addEventListener('initAfterAjax', () => {
    modalInit();
  });
};

// Initialisation
modalInit();
