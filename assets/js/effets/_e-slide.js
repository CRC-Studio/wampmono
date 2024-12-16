

/**
* Animation : slideUp(), slideDown() et slideToggle()
* 
* Exemple : slideUp($el);
* Exemple : slideDown($el, 1000);
*/

export const slideUp = ($el, duration = 500, display = 'block') => {
  return new Promise(function (resolve, reject) {
    $el.style.height = $el.offsetHeight + 'px'
    $el.style.transitionProperty = `height, margin, padding`
    $el.style.transitionDuration = duration + 'ms'
    $el.offsetHeight // eslint-disable-line no-unused-expressions
    $el.style.overflow = 'hidden'
    $el.style.height = 0
    $el.style.paddingTop = 0
    $el.style.paddingBottom = 0
    $el.style.marginTop = 0
    $el.style.marginBottom = 0
    window.setTimeout(function () {
      $el.style.display = 'none'
      $el.style.removeProperty('height')
      $el.style.removeProperty('padding-top')
      $el.style.removeProperty('padding-bottom')
      $el.style.removeProperty('margin-top')
      $el.style.removeProperty('margin-bottom')
      $el.style.removeProperty('overflow')
      $el.style.removeProperty('transition-duration')
      $el.style.removeProperty('transition-property')
      resolve(false)
    }, duration)
  })
}

// Slide Down

export const slideDown = ($el, duration = 500, display = 'block') => {
  return new Promise(function (resolve, reject) {
    $el.style.removeProperty('display');
    $el.style.display = display;
    let height = $el.offsetHeight
    $el.style.overflow = 'hidden'
    $el.style.height = 0
    $el.style.paddingTop = 0
    $el.style.paddingBottom = 0
    $el.style.marginTop = 0
    $el.style.marginBottom = 0
    $el.offsetHeight // eslint-disable-line no-unused-expressions
    $el.style.transitionProperty = `height, margin, padding`
    $el.style.transitionDuration = duration + 'ms'
    $el.style.height = height + 'px'
    $el.style.removeProperty('padding-top')
    $el.style.removeProperty('padding-bottom')
    $el.style.removeProperty('margin-top')
    $el.style.removeProperty('margin-bottom')
    window.setTimeout(function () {
      $el.style.removeProperty('height')
      $el.style.removeProperty('overflow')
      $el.style.removeProperty('transition-duration')
      $el.style.removeProperty('transition-property')
    }, duration)
  })
}

// Slide Toggle

export const slideToggle = ($el, duration = 500, display = 'block') => {
  if (window.getComputedStyle($el).display === 'none') {
    return slideDown($el, duration, display)
  } else {
    return slideUp($el, duration, display)
  }
}
