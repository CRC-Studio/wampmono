/**
*  Module : Input Checker
*
*/

// Import les effets

import * as eFade from '../effets/_e-fade.js';



// Cette fonction permet de vérifier les formulaires

export const inputCheck = ($input) => {

  // Ajoute qq var pour simplifier le ciblage
  let $inputParent = $input.parentNode;
  let $inputError = $inputParent.querySelector('.m-frm-msg');

  // Cache temporairement le msg d'erreur
  $input.classList.remove('m-frm-err');
  if (typeof ($inputError) != 'undefined' && $inputError != null) {
    $inputError.remove();
  }

  // Si l'Input n'est pas correctement rempli
  if (!$input.checkValidity()) {

    // Ajoute la class error
    $input.classList.add('m-frm-err');

    // Ajoute un message d'erreur
    let $spanError = document.createElement('span');
    $spanError.className = 'm-frm-msg m-body-s';
    $spanError.textContent = $input.validationMessage;
    $input.after($spanError);

    // Affiche un message d'erreur
    eFade.fadeIn($spanError);
  }
}


// Initialise le module

export let $inputRequireds;
export const inputCheckerInit = () => {
  // Sélectionne les formulaires
  $inputRequireds = document.querySelectorAll('.m-frm input[required]');

  $inputRequireds.forEach($input => {

    // Ajoute une fonction anonyme pour passer $input
    const checkInput = () => inputCheck($input);

    // Les input seront vérifer au changement d'état
    $input.removeEventListener('change', checkInput);
    $input.addEventListener('change', checkInput);

    // Les inputs qui ne sont pas des checkbox seront
    // aussi vérifier au focus Out
    if ($input.getAttribute('type') != 'checkbox') {
      $input.removeEventListener('change', checkInput);
      $input.addEventListener('focusout', checkInput);
    }

  });
};
inputCheckerInit();