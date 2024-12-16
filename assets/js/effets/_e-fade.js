/**
  * Effet : FadeIn
  *
  * Exemple : fadeIn($el);
  */


export const fadeIn = ($el, duration = 1000, delay = 0) => {
  if ($el) {
    $el.style.transition = `opacity ${duration}ms ease, height ${duration}ms ease`;
    $el.style.transitionDelay = `${delay}ms`;
    $el.style.opacity = '0';
    $el.style.height = '0';
    $el.style.pointerEvents = 'none';

    window.requestAnimationFrame(() => {
      // Déclenche la transition
      $el.style.opacity = '1';
      $el.style.height = 'auto';
      $el.style.pointerEvents = 'auto';
    });

    // Reset les transitions
    setTimeout(() => {
      $el.style.transition = '';
      $el.style.transitionDelay = '';
    }, duration + delay);
  }
};

/**
 * Effet : FadeOut
 */
export const fadeOut = ($el, duration = 1000, delay = 0) => {
  if ($el) {
    $el.style.transition = `opacity ${duration}ms ease, height ${duration}ms ease`;
    $el.style.transitionDelay = `${delay}ms`;
    $el.style.opacity = '1';
    $el.style.height = 'auto';
    $el.style.pointerEvents = 'auto';

    window.requestAnimationFrame(() => {
      // Déclenche la transition
      $el.style.opacity = '0';
      $el.style.height = '0';
      $el.style.pointerEvents = 'none';
    });

    // Reset les transitions
    setTimeout(() => {
      $el.style.transition = '';
      $el.style.transitionDelay = '';
    }, duration + delay);
  }
};