/**
 * Module : Form Label
 */


// Modifie le label si l'input est vide

export const formLabelUpdate = ($input, $label) => {
  if ($input && $label) {
    // Réinitialise les Class
    $label.removeAttribute('class');

    // Ajoute au besoin une class
    if ($input.value.length !== 0) {
      $label.classList.add('e-fld');
    }
  }
};

// Modifie le label si l'input est focus

export const formLabelfocus = ($input, $label) => {
  if ($input && $label) {
    // Réinitialise les Class
    $label.removeAttribute('class');
    // Ajoute  une class
    $label.classList.add('e-fcs');
  }
};


// Initialise le module

export const formLabelInit = () => {
  let $inputsLabel = document.querySelectorAll('.m-frm-lbl');
  $inputsLabel.forEach($inputLabel => {

    // Sélectionne les éléments
    let $input = $inputLabel.querySelector('input');
    let $label = $inputLabel.querySelector('label');

    if ($input && $label) {
      // Vérifie si l'input est préremplie
      formLabelUpdate($input, $label);

      // Vérifie si l'input est déjà focus
      if ($input === document.activeElement) {
        formLabelfocus($input, $label);
      }

      // Définit les gestionnaires d'événements
      const onFocus = () => formLabelfocus($input, $label);
      const onFocusOut = () => formLabelUpdate($input, $label);

      // Ajoute les events
      $input.removeEventListener('focus', onFocus);
      $input.addEventListener('focus', onFocus);

      $input.removeEventListener('focusout', onFocusOut);
      $input.addEventListener('focusout', onFocusOut);
    }
  });

  // Réinitialise le module après un chargement Ajax
  document.removeEventListener('initAfterAjax', formLabelInit);
  document.addEventListener('initAfterAjax', formLabelInit);
};
formLabelInit();