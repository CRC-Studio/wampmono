/**
* Effet : Text Scramble
*/

// Permet de suivre l'état de l'animation de chaque élément
let animationsInProgress = {};

/**
* Permet de générer des chaînes de caractères aléatoires
*/

export const scramRandomString = (randomLength) => {
  let randomString = '';

  for (let i = 0; i < randomLength; i++) {
    randomString += set.charAt(Math.floor(Math.random() * set.length));
  }

  return randomString;
}

/**
* Permet d'animer les textes scrambles
*/

export const scramAnim = ($el) => {
  // Vérifie si une animation est déjà en cours pour cet élément $el
  if (animationsInProgress[$el]) return;

  animationsInProgress[$el] = true; // Définit l'animation en cours pour cet élément

  // Ajoute quelques variables
  let originalText = $el.textContent;
  let newText = '';

  for (let i = 1; i <= originalText.length; i++) {
    setTimeout(() => {
      newText = originalText.substring(0, Math.min(i, originalText.length));

      let randomLength = originalText.length - i;
      let randomString = scramRandomString(randomLength);

      newText = newText + randomString;
      $el.textContent = newText;

      if (i === originalText.length) {
        // Réinitialise l'état de l'animation pour cet élément une fois terminée
        animationsInProgress[$el] = false;
      }
    }, i * v);
  }
};


/**
* Permet d'animer les textes au scroll
*/

export const scramAnimHover = (e) => {
  let $scramble = e.currentTarget.closest('.e-txtsble');
  scramAnim($scramble);
}

/**
* Initialisation
*/

let $scrambles, set, v;

export const scramInit = () => {
  // Définit les variables
  $scrambles = document.querySelectorAll('.e-txtsble');
  set = 'abcdefghijklmnopqrstuvwxyz';
  v = 30; // Vitesse

  $scrambles.forEach(($scramble) => {
    $scramble.removeEventListener('mouseenter', scramAnimHover);
    $scramble.addEventListener('mouseenter', scramAnimHover);
  });
};
scramInit();
