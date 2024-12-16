/**
  * Effet : Transition
  * 
  * $class    : permet de choisir l'animation CSS
  * $duration : modifie la durée de l'animation par defaut
  * $duration : modifie la délais par defaut avant le lancement de l'animation CSS
  */

export const transition = ($class = '', duration, delay) => {
  // Créer une nouvelle div
  const $trs = document.createElement('div');

  // Ajouter les classes à la nouvelle div
  $trs.classList.add('e-trs', $class);

  // Modifie la durée de la transition
  if (duration) {
    $trs.style.animationDuration = duration / 1000 + 's';
  }

  // Modifie la délais avant le lancement de la transition
  if (duration) {
    $trs.style.animationDelay = delay / 1000 + 's';
  }

  // Sélectionner le main
  const $main = document.querySelector('main');

  // Ajouter la nouvelle div au main
  $main.prepend($trs);
}