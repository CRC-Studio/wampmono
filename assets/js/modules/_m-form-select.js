/**
 * Module : Form select
 */

// Import les effets

import * as eSlide from '../effets/_e-slide.js';


// Permet de changer les options

export const formSelectUpdate = (e) => {
  let $formSelect = e.currentTarget.closest('.m-frm-slct');
  let $selectItem = e.target.closest('.m-slct-op');
  let $select = $formSelect.querySelector('select');
  let $selectCustom = $formSelect.querySelector('.m-slct-cstm');

  if ($selectItem) {
    let txt = $selectItem.textContent;
    let val = $selectItem.getAttribute('data-value');
    $selectCustom.value = txt;
    $select.value = val;
    $select.dispatchEvent(new Event('change'));
  }
}


// Permet d'ouvrir et fermer la liste

export const formSelectOpen = (e) => {
  let $formSelect = e.currentTarget.closest('.m-frm-slct');
  let $selectItems = $formSelect.querySelector('.m-slct-ops');

  eSlide.slideToggle($selectItems, 200);
}

// Permet de supprimer une div et un input

export const formSelectDeleteCustomDiv = ($select) => {
  // Sélectionne le parent
  let $formSelect = $select.closest('.m-frm-slct');
  let $selectCustom = $formSelect.querySelector('.m-slct-cstm');
  let $selectItems = $formSelect.querySelector('.m-slct-ops');

  if ($selectCustom) {
    $selectCustom.remove();
  }

  if ($selectItems) {
    $selectItems.remove();
  }
}

// Permet d'ajouter une div et un input

export const formSelectAddCustomDiv = ($select) => {
  // Sélectionne le parent
  let $formSelect = $select.closest('.m-frm-slct');

  // Ajoute un input
  $selectCustom = document.createElement('input');
  $selectCustom.className = 'm-slct-cstm';
  $selectCustom.readOnly = true;
  $formSelect.appendChild($selectCustom);

  // Ajoute une div pour la liste
  $selectItems = document.createElement('div');
  $selectItems.className = 'm-slct-ops e-hde';
  $formSelect.appendChild($selectItems);

  // Ajoute les options dans la liste
  $selectOptions = $select.querySelectorAll('option');
  $selectOptions.forEach(($option) => {
    let val = $option.getAttribute('value');
    let txt = $option.textContent;

    $selectItem = document.createElement('div');
    $selectItem.className = 'm-slct-op';
    $selectItem.setAttribute('data-value', val);
    $selectItem.textContent = txt;
    $selectItems.appendChild($selectItem);

    // Modifie la liste au clic sur une option
    $selectItems.removeEventListener('click', formSelectUpdate);
    $selectItems.addEventListener('click', formSelectUpdate);

    // Affiche une valeur par défaut si le select possède une option selected
    if ($option.selected) {
      $selectCustom.value = txt;
    }
  });
}


// Initialisation du module

let $formSelects, $selectCustom, $selectItems, $selectItem, $selectOptions;
export const formSelectInit = () => {
  // Sélectionne tous les éléments .m-frm-slct
  $formSelects = document.querySelectorAll('.m-frm-slct');

  // Parcourt tous les éléments .m-frm-slct
  $formSelects.forEach(($formSelect) => {
    // Cherche le select à l'intérieur de chaque .m-frm-slct
    let $select = $formSelect.querySelector('select');

    // Vérifie s'il y a un select à l'intérieur
    if ($select) {
      // Ajoute quelques divs au DOM
      formSelectDeleteCustomDiv($select);
      formSelectAddCustomDiv($select);

      // Ouvre et ferme la liste .select-items au clic
      $formSelect.removeEventListener('click', formSelectOpen);
      $formSelect.addEventListener('click', formSelectOpen);

    }
  });

  // Réinitialise le module après un chargement Ajax
  document.addEventListener('initAfterAjax', formSelectInit);
};
formSelectInit();