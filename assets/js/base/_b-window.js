
/**
* Initialise qq variables
*/

// Permet de stoker la position actuel du scroll
let scrollY;

/**
* Fonction : updateVh()
* 
* Modifie la variable --vh lors du redimensionnement.
*/

export const updateVh = () => {
  const vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
}
updateVh();

window.addEventListener('resize', updateVh);
window.addEventListener('orientationchange', updateVh);


/**
* Fonction window_is_scroll
*
* Modifie le DOM si l'utilisateur scroll
*/

export const window_is_scroll = () => {
  scrollY = window.scrollY;

  // Dispatch l'event windowIsScroll
  document.dispatchEvent(new CustomEvent('windowIsScroll', { detail: { scrollY } }));

  if (scrollY < 10) {
    document.dispatchEvent(new CustomEvent('windowIsTop'));
  }
};
window_is_scroll();


/**
* Fonction window_is_resize
*
* Modifie le DOM au resize de la fenêtre
*/

export const window_is_resize = () => {

  // Ferme la nav mobile sur Desktop
  if ((window.innerWidth > 768)) {
    // mOverlay.overlayHide();
  }
};


/**
* Initialisation de quelques fonctions
*/

// Lance des fonction si la fenêtre est recadrée
window.addEventListener('resize', (e) => {
  window_is_resize();
  window_is_scroll();
});

// Lance des fonction si l'utilisateur scroll
document.addEventListener('scroll', (e) => {
  window_is_scroll();
});