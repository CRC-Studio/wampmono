
/**
 * Effet e-dnk
 */

// Fonction pour mettre en pause l'animation
export const denkoAnimPause = (e) => {
  let $denko = e.currentTarget;
  let $parent = $denko.parentElement;
  let $siblings = $parent.querySelectorAll('.e-dnk');
  $siblings.forEach(($sibling) => {
    $sibling.style.animationPlayState = 'paused';
  });
}

// Fonction pour reprendre l'animation
export const denkoAnimResume = (e) => {
  let $denko = e.currentTarget;
  let $parent = $denko.parentElement;
  let $siblings = $parent.querySelectorAll('.e-dnk');
  $siblings.forEach(($sibling) => {
    $sibling.style.animationPlayState = 'running';
  });
}

let $denkos
export const denkoInit = () => {
  // Sélectionne les denkos
  $denkos = document.querySelectorAll('.e-dnk li');

  $denkos.forEach(($denko) => {

    // Calcule la largeur des éléments
    let w = $denko.offsetWidth;
    let screenWidth = window.innerWidth;

    // Gère la vitesse d'anmiation
    let a, s, t; // Accélaration, Speed, Temps
    a = $denko.dataset.speed !== undefined ? parseFloat($denko.dataset.speed) : 1;
    s = 20;
    t = w / s / a;
    $denko.style.animationDuration = t + 's';

    // Calcule le nombre de clone nécessaire
    let cloneCount = Math.ceil(screenWidth / w);

    // Clône le contenu
    for (let i = 0; i < cloneCount; i++) {
      let clone = $denko.cloneNode(true);
      $denko.parentNode.appendChild(clone);
    }


    // Ajoute les écouteurs d'événements pour mettre en pause et reprendre l'animation
    $denko.removeEventListener('mouseenter', denkoAnimPause);
    $denko.addEventListener('mouseenter', denkoAnimPause);
    $denko.removeEventListener('mouseleave', denkoAnimResume);
    $denko.addEventListener('mouseleave', denkoAnimResume);
  });
}
denkoInit();