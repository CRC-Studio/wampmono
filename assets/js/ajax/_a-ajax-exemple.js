/**
* Fonction : exempleDeFonctionAjax()
*
*/

// Import les fonctions Ajax

import * as aAjax from './_a-ajax';

// Permet de mettre à jour le DOM en AJAX

export const ajaxExemple = (e) => {
  // Empêche le comportement normal
  e.preventDefault();

  // Récupère les infos
  let titre = titreInput.value;
  let auteur = auteurInput.value || '';

  // Envoie une requête en Ajax
  let params = {
    'titre': titre,
    'auteur': auteur,
    'userid': userid
  };
  let action = '../fonctions/f__exemple.php';

  // Envoie une requête en Ajax
  aAjax.newAjaxRequest(
    params, action,
    function (data) {
      // Met à jour le DOM
      aAjax.ajaxUpdateDOM(data);
      // Réinitialise les variables
      aAjax.initAfterAjax();
    },
    function (error) {
      console.error(error);
    }
  );
}

// Initialise le module

let $btn;
export const ajaxExempleInit = () => {
  $btn = document.querySelector('#btn-exemple');
  if ($btn !== null) {
    $btn.removeEventListener('click', ajaxExemple);
    $btn.addEventListener('click', ajaxExemple);
  }
}
ajaxExempleInit();
