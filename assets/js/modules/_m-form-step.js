/**
 * Module : Form Step
 */

// Import les module

import * as mInputChecker from './_m-input-checker.js';


// Permet de passer d'une étape à l'autre d'un formulaire

const formStepChange = () => {
  const $checkSteps = document.querySelectorAll('.w-chk-stp');
  if ($checkSteps.length > 0) {

    // Affiche l'étape
    const stepClass = '.w-chk-stp0' + step;
    $checkSteps.forEach(step => step.style.display = 'none');
    const $currentStep = document.querySelector(stepClass);
    if ($currentStep) {
      $currentStep.style.display = 'flex';
    }
  }
}

// Permet de vérifier qu'une étape est correctement complétée

export const isStepValid = ($formCheck) => {

  // Ajoute qq variable
  let isValid = true;

  // Sélectionne les inputs de l'étape
  let $inputs = $formCheck.querySelectorAll('input[required]');

  // Vérifie chaque inputs
  $inputs.forEach(($input) => {
    if (!$input.validity.valid) {

      // Affiche un message d'erreur
      mInputChecker.inputCheck($input)

      // Change la valeur de la varibale de controle
      isValid = false;
    }
  });

  console.log(isValid);

  // Retourne le résultat au Template
  return isValid;
}

// Initialise le module

export let step, $formCheck;
export const formStepInit = () => {
  document.addEventListener('click', (e) => {
    // Vérifie si l'élément cliqué est un bouton de passage à l'étape suivante
    if (e.target.classList.contains('btn-stp')) {
      // Sélectionne le fieldset
      $formCheck = e.target.closest('fieldset');

      if ($formCheck) {
        if (isStepValid($formCheck)) {
          e.preventDefault();
          $formCheck.classList.remove('e-fail');

          // Change l'étape du formulaire
          step = parseInt(e.target.getAttribute('data-step'));
          formStepChange();

          // Met à jour le fil d'ariane
          initBread();
          initCheckRecap();
        } else {
          $formCheck.classList.add('e-fail');
        }
      }
    }
  });
}
formStepInit();