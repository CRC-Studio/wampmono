/**
* Effet Caméléon
*/

// Permet de sélectionner la section le plus proche
// du bord haut de l'écran

export const cameleonGetclosestSection = (targetHeight) => {
  if (targetHeight) {
    // Ajoute qq variable
    let $sectionBelow = null;

    // Récupère la position du scroll
    var scrollY = window.scrollY || window.pageYOffset;

    // Sélectionne toutes les sections
    const $sections = document.querySelectorAll('section');

    $sections.forEach($section => {
      // Récupère les coordonnées de l'élément
      let sectionTop = $section.offsetTop;
      let sectionBottom = sectionTop + $section.offsetHeight;

      let viewportTop = window.pageYOffset || document.documentElement.scrollTop;
      let viewportBottom = viewportTop + targetHeight;

      // Return True si l'élément est dans le viewport
      if (sectionBottom > viewportTop && sectionTop < viewportBottom) {
        $sectionBelow = $section
      };
    });

    // Retourne le résultat au template
    return $sectionBelow;
  }
}

// Permet de changer la couleur de la cible

export const cameleonChangeColor = (e) => {
  // Cheche la section la plus proche
  let $closestSection = cameleonGetclosestSection(targetHeight);

  if ($closestSection !== $lastClosestSection) {
    // Mets à jour $lastClosestSection
    $lastClosestSection = $closestSection;

    // Change la couleur du header
    if ($closestSection && $closestSection.classList.contains('m-bga')) {
      $target.classList.add('m-bga');
      $target.classList.remove('m-bgb');
    } else {
      $target.classList.add('m-bgb');
      $target.classList.remove('m-bga');
    }

  }
}


// Permet de changer la couleur du header en fonction
// de la couleur de section en dessous

let $lastClosestSection = null;
let $target, targetHeight;
export const cameleonInit = (e) => {

  // Sélectionne une cible
  $target = document.querySelector('.l-head');

  if ($target) {
    // Cherche la hauteur de la cible
    targetHeight = $target.offsetHeight;

    // Change la couleur de la cible
    cameleonChangeColor();

    // Ajoute un événement
    window.addEventListener('scroll', () => {
      cameleonChangeColor();
    });
  }

}
cameleonInit();