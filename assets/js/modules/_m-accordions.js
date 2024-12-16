/**
* Module : Accordion
*/

// Fonction pour gérer l'animation des accordions

export const acdToggle = (e, $accordion) => {
  if ($accordion) {
    let $accordionWrp = $accordion.querySelector('.m-acd__wrp');
    $accordion.classList.toggle('e-on');
  }
}

// Initialisation des événements
let $accordions;
export const acdInit = () => {
  $accordions = document.querySelectorAll('.m-acd');
  $accordions.forEach($accordion => {
    let $accordionTitle = $accordion.querySelector('.m-acd-ttl');
    if ($accordionTitle) {
      $accordionTitle.removeEventListener('click', acdToggle);
      $accordionTitle.addEventListener('click', e => acdToggle(e, $accordion));
    }
  });
}
acdInit();