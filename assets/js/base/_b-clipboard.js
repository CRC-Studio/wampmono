

/**
* Fonction copyToClipboardOnClick
*
*/

// Import les effets
import * as mToast from '../modules/_m-toast.js';


export const clipbordInit = () => {
  let $els = document.querySelectorAll('.js-copy');

  $els.forEach($el => {
    $el.addEventListener('click', function (e) {
      e.preventDefault();

      const copiedText = this.getAttribute('data-copy');

      // Copiez le texte dans le presse - papiers
      navigator.clipboard.writeText(copiedText)
        .then(() => {
          let msg = 'Copié !';
          mTooltip.tooltipShow($el, msg);
        })
        .catch(err => {
          let msg = 'Erreur';
          mTooltip.tooltipShow($el, msg);
        });
    });
  });
};
clipbordInit();