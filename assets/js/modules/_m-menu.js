/**
* Module : Menu
*/

// Import les effets

import * as eFade from '../effets/_e-fade';
import * as aAjax from '../ajax/_a-ajax';


/**
* menuKeyShort()
*
* Ajoute des raccourcies claviers
*/

export const menuKeyShort = (e) => {
  if (e.key === 'Escape') {
    menuHide();
  }
};


/**
* menuCheckBeforeHide()
*
* Vérifie si le menu doit être fermé
*/

export const menuCheckBeforeHide = (e) => {
  const isInsideMenu = $menu.contains(e.target);
  if (!isInsideMenu) {
    menuHide();
  }
};


/**
* getMenuPosition()
*
* Détermine la position du menu
*/

export const getMenuPosition = (e) => {
  // Récupère les coordonnées de la souris
  const mouseX = e.clientX;
  const mouseY = e.clientY;

  // Récupère les dimensions et la position du conteneur principal
  const main = document.querySelector('main');
  const mainRect = main.getBoundingClientRect();
  const mainWidth = mainRect.width;
  const mainHeight = mainRect.height;
  const mainTop = mainRect.top;
  const mainLeft = mainRect.left;

  // Détermine la position horizontale du menu
  let menuX;
  if (mouseX + $menu.offsetWidth > mainLeft + mainWidth) {
    menuX = mouseX - $menu.offsetWidth;
  } else {
    menuX = mouseX;
  }

  // Détermine la position verticale du menu
  let menuY;
  if (mouseY + $menu.offsetHeight > mainTop + mainHeight) {
    menuY = mouseY - $menu.offsetHeight;
  } else {
    menuY = mouseY;
  }

  // Retourne le résultat au Template
  return { x: menuX, y: menuY };
};


/**
* menuShow()
*
* Affiche le menu
*/

export const menuShow = (e, $menuBtn) => {
  // Empêche l'ouverture du menu de Chrome
  e.preventDefault();
  // Empêche la propagation de l'événement
  e.stopPropagation();

  // Récupère les infos
  let elId = $menuBtn.getAttribute('data-id');
  let menTemplate = $menuBtn.getAttribute('data-men');

  // Envoie une requête en Ajax
  let params = {
    'elId': elId,
    'menTemplate': menTemplate
  };
  let action = '../ajax/fa__menu.php';

  // Envoie une requête en Ajax
  aAjax.newAjaxRequest(
    params, action,
    function (data) {
      // Met à jour le DOM
      aAjax.ajaxUpdateDOM(data);
      // Réinitialise les variables
      aAjax.initAfterAjax();

      // Mets à jour $menu
      $menu = document.querySelector('.m-men');

      // Vérifie si le menu doit être fermé au clic
      document.removeEventListener('click', menuCheckBeforeHide);
      document.addEventListener('click', menuCheckBeforeHide);

      // Vérifie si le menu doit être fermé au clic droit
      document.removeEventListener('contextmenu', menuCheckBeforeHide);
      document.addEventListener('contextmenu', menuCheckBeforeHide);

      // Affiche le menu
      eFade.fadeIn($menu);

      // Déplace le menu
      let menuPosition = getMenuPosition(e);
      $menu.style.left = menuPosition.x + 'px';
      $menu.style.top = menuPosition.y + 'px';
    },
    function (error) {
      console.error(error);
    }
  );
};


/**
* menuHide()
*
* Masque le menu
*/

export const menuHide = () => {
  eFade.fadeOut($menu);
};


/**
* menuInit()
*
* Initialise le module
*/

export let $menu, $menuBtns, $menuBtn;
export const menuInit = () => {
  $menu = document.querySelector('.m-men');

  if ($menu) {
    // Ferme le menu si l'utilisateur clique à l'extérieur du menu
    // document.addEventListener('click', (e) => {
    //   const isInsideMenu = $menu.contains(e.target);
    //   if (!isInsideMenu) {
    //     menuHide();
    //   }
    // });

    // Cherche les élèments ouvrant le menu
    $menuBtns = document.querySelectorAll('.m-men-btn');
    $menuBtns.forEach($menuBtn => {
      // Affiche le Menu
      $menuBtn.removeEventListener('contextmenu', menuShow);
      $menuBtn.addEventListener('contextmenu', e => menuShow(e, $menuBtn));
    });
  }
};
menuInit();