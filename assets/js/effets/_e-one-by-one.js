/**
* Animation : Effect One by One
*
* L'effet One-by-One permet d'afficher les éléments
* d'une liste un par un
*
* Exemple :
* <ul class="e-obo">
*   <li></li>
*   <li></li>
* </ul>
*/


// Import les Modules
import * as eFade from '../effets/_e-fade.js';


/**
* Initialisation
*/

export const oboInit = () => {

  // Déclare qq variables
  const $obos = document.querySelectorAll('.e-obo > *');
  const fadeDuration = 1000;
  const fadeDelay = 200;

  // Options pour l'IntersectionObserver
  const observerOptions = {
    // viewport par défaut
    root: null,
    rootMargin: '0px',
    // élément visible à 10%
    threshold: 0.1
  };

  const observer = new IntersectionObserver((entries, observer) => {
    let delayCounter = 0; // Nouveau compteur local à chaque série d'éléments visibles

    entries.forEach((entry) => {
      if (entry.isIntersecting && !entry.target.classList.contains('faded-in')) {
        const $obo = entry.target;

        // Lancer l'animation fadeIn avec les variables
        setTimeout(() => {
          eFade.fadeIn($obo, fadeDuration, delayCounter * fadeDelay);
          $obo.classList.add('faded-in'); // Marquer l'élément comme affiché
        }, delayCounter * fadeDelay);

        delayCounter++; // Incrémenter uniquement pour les éléments visibles
        observer.unobserve($obo); // Arrêter l'observation après l'animation
      }
    });
  }, observerOptions);

  // Observer chaque élément de la liste
  $obos.forEach($obo => observer.observe($obo));
};

// Initialise le module
oboInit();

// Réinitialise l'effet One-by-One après un chargement Ajax
document.removeEventListener('initAfterAjax', oboInit);
document.addEventListener('initAfterAjax', oboInit);