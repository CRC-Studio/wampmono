/**
*  Module : Form Checker
*
*  Empêche l'utilisateur de valider le formulaire
*  s'il n'est pas rempli correctement
*/

export const formChecker = ($form) => {
  // Sélectionne le bouton submit
  let $submit = $form.querySelector('input[type="submit"]');

  // Vérifiez si le formulaire est valide
  if ($submit) {
    if ($form.checkValidity()) {
      $submit.classList.remove('e-dsbld');
    } else {
      $submit.classList.add('e-dsbld');
    }
  }
};


// Initialise le module

export let $forms;
export const formCheckerInit = () => {
  // Sélectionne les formulaires
  $forms = document.querySelectorAll('.m-frm');

  $forms.forEach($form => {
    // Vérifie si le form est préremplie
    formChecker($form);

    // Vérifie si bouton Submit doit-être réactivé
    $form.removeEventListener('input', () => formChecker($form));
    $form.addEventListener('input', () => formChecker($form));

  });
};
formCheckerInit();