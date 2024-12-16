/**
* Fonction : If Is Safari
*
*/

// Permet d'ajouter une class au <body>
// si l'utilisateur utilise Safari



export const isSafariInit = () => {
  // Détection de Safari
  let isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

  // Ajoute une class au <body>
  if (isSafari) {
    document.body.classList.add('is-saf');
  }
}
isSafariInit();