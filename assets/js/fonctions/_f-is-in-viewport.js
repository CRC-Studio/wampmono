/**
* Fonction : isInViewport()
*
* Vérifie si un élément est dans le viewport
*
* Exemple : if(isInViewport($el)){};
*/

// Import les Modules

import * as outerHeight from '../base/_b-outerHeight';


/**
* Initialisation
*/

export const isInViewport = ($el) => {
  if ($el) {
    const $elTop = $el.offsetTop;
    const $elHeight = outerHeight.outerHeight($el);
    const $elBottom = $elTop + $elHeight;

    const viewportTop = window.scrollY;
    const viewportBottom = viewportTop + window.innerHeight;

    return $elBottom > viewportTop && $elTop < viewportBottom;
  }
}