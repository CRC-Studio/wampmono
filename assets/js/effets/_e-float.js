
/**
* Effet is--float
*/


// Import les fonctions
import * as fIsInViewport from '../fonctions/_f-is-in-viewport.js';


/**
* Permet de faire bouger les élèments
* avec l'effet is--float
*/

export const floatEffect = () => {
  $floats.forEach($float => {
    if (fIsInViewport.isInViewport($float)) {
      $float.style.top = 0;
    }
  });
}

/**
* Initialise le module
*/

let $floats;

export const floatInit = () => {
  $floats = document.querySelectorAll('.is--float');
}
floatInit();