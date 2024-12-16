/**
 * Module : Form number
 */

// Permet de vérifier le format de l'input

export const formNumberCheck = (e) => {
  $inputNumber = e.currentTarget;
  maxlength = $inputNumber.getAttribute('maxlength');

  if (maxlength && $inputNumber.value.length > maxlength) {
    $inputNumber.value = $inputNumber.value.slice(0, maxlength);
  }
}


// Initialisation du module

let $inputNumbers, $inputNumber;
let maxlength;
export const formNumberInit = () => {
  // Sélectionne tous les inputs de type Number
  $inputNumbers = document.querySelectorAll('.m-frm input[type="number"]');

  // Parcourt tous les inputs de type Number
  $inputNumbers.forEach(($inputNumber) => {
    // Ouvre et ferme la liste .select-items au clic
    $inputNumber.removeEventListener('input', formNumberCheck);
    $inputNumber.addEventListener('input', formNumberCheck);

  });

  // Réinitialise le module après un chargement Ajax
  document.addEventListener('initAfterAjax', formNumberInit);
};
formNumberInit();