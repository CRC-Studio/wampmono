/**
  * Effet : Timer
  *
  * Exemple : fadeIn($el);
  */



export const timerUpdate = ($timer, dateCible) => {
  // Met à jour la date actuelle à chaque itération
  let dateNow = new Date(Date.now());

  // Calculer la différence entre les deux dates en millisecondes
  let difference = dateCible - dateNow;

  // Vérifier si la date cible est dépassée
  if (difference < 0) {
    $timer.innerHTML = "Temps écoulé";
    return; // Arrêter la fonction si le temps est écoulé
  }

  // Convertir la différence en hour, min et sec
  let hour = Math.floor(difference / (1000 * 60 * 60));
  difference %= (1000 * 60 * 60);
  let min = Math.floor(difference / (1000 * 60));
  difference %= (1000 * 60);
  let sec = Math.floor(difference / 1000);

  // Afficher le temps restant dans l'élément avec la classe "e-timer"
  $timer.innerHTML = hour + " H " + min + " MIN " + sec + " SEC";
}


/**
* Initialise le module
*/

let $timers;

export const timerInit = () => {
  // Sélectionne les timers
  $timers = document.querySelectorAll('.e-timer');

  $timers.forEach($timer => {

    // Récupérer la valeur de data-time en tant que timestamp UNIX
    let dateCible = parseInt($timer.dataset.time);

    // Convertir la date cible en objet Date en millisecondes
    dateCible = new Date(dateCible * 1000);

    // Actualiser le compteur toutes les secondes
    setInterval(function () {
      timerUpdate($timer, dateCible);
    }, 1000);

  });
}
timerInit();