/**
* Module : Bouton
*/

// Active le bouton
export const btnOff = ($btn) => {

  if ($btn) {
    // Sauvegarde le texte du lien
    // si cela n'a pas déjà été fait
    if (!$btn.hasAttribute('data-txt')) {
      let txt = $btn.textContent;
      $btn.setAttribute('data-txt', txt);
    };

    // Remplace le texte par un texte temportaire
    $btn.textContent = "Mise à jour...";

    // Ajoute la class Load
    $btn.classList.add('m-btn-load');
  };

};

// Désactive le bouton
export const btnOn = ($btn) => {

  if ($btn) {
    // Remplace le texte temportaire par le texte d'origine
    let txt = $btn.getAttribute('data-txt');
    $btn.textContent = txt;

    // Supprime la class Load
    $btn.classList.remove('m-btn-load');
  };

};
