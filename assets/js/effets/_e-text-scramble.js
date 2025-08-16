/**
* Effet : Text Scramble
*/

// Permet de suivre l'état de l'animation de chaque élément
let animationsInProgress = new WeakMap();

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
  if (animationsInProgress.get($el)) return;

  animationsInProgress.set($el, true);

  let originalText = $el.textContent;
  let textArray = originalText.split(''); // Transforme en tableau
  let newTextArray = [...textArray]; // Copie du texte

  for (let i = 1; i <= textArray.length; i++) {
    setTimeout(() => {
      // Révèle progressivement les caractères, en gardant les espaces intacts
      for (let j = 0; j < i; j++) {
        if (textArray[j] !== ' ') {
          newTextArray[j] = textArray[j];
        }
      }

      // Génère un scramble pour les caractères restants
      for (let j = i; j < textArray.length; j++) {
        if (textArray[j] !== ' ') {
          newTextArray[j] = scramRandomString(1); // 1 seul caractère aléatoire
        }
      }

      $el.textContent = newTextArray.join('');

      if (i === textArray.length) {
        animationsInProgress.set($el, false);
      }
    }, i * v);
  }
};


/**
* Permet filter les <br> des textes Scramble
*/

export const scramFilter = ($el) => {
  // Si l'élément contient déjà des e-txtsble-line, on ne refait pas le traitement
  if ($el.querySelector('.e-txtsble-line')) {
    return Array.from($el.querySelectorAll('.e-txtsble-line'));
  }

  let html = $el.innerHTML;
  let lines = html.split(/<br\s*\/?>/i); // Sépare en conservant les lignes

  // Remplace le contenu par des spans pour chaque ligne
  $el.innerHTML = lines
    .map(line => `<span class="e-txtsble-line">${line}</span>`)
    .join('<br>');

  return Array.from($el.querySelectorAll('.e-txtsble-line'));
};


/**
* Permet d'animer les textes au scroll
*/

export const scramAnimHover = (e) => {
  let $scramble = e.currentTarget.closest('.e-txtsble');
  let $targets = $scramble.querySelectorAll('.e-txtsble-tar');

  // Si aucun .e-txtsble-tar → on prend le parent
  if (!$targets.length) {
    $targets = [$scramble];
  }

  $targets.forEach(($target) => {
    let $lines = scramFilter($target);
    $lines.forEach(($line) => {
      scramAnim($line);
    });
  });
};


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
