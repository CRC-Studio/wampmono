/**
* Module : Toast
*/

// Ajoute des modules
import * as bVar from '../base/_b-var.js';
//import * as lang from '../fonctions/_f-lang.js';


// Permet de cacher les Toast

export const detoast = () => {
  let toast = document.querySelector('.m-tst');
  toast.style.opacity = 0;

  setTimeout(function () {
    toast.style.width = 0;
    toast.style.height = 0;
    toast.style.padding = 0;

    let toastContent = document.querySelector('.m-tst-wrp');
    toastContent.style.opacity = 0;
  }, 1000);
}

// Permet d'afficher un toat

export const toast = (msg) => {

  let toastContent = document.querySelector('.m-tst-wrp');
  toastContent.textContent = msg;

  let toast = document.querySelector('.m-tst');
  let autoWidth = toast.offsetWidth;
  let autoHeight = toast.offsetHeight;
  let paddT = window.getComputedStyle(toast).paddingTop;
  let paddL = window.getComputedStyle(toast).paddingLeft;

  toast.style.width = 0;
  toast.style.height = 0;
  toast.style.marginBottom = autoHeight / 2 + 'px';
  toast.style.marginRight = autoHeight / 2 + 'px';
  toast.style.padding = 0;
  toast.style.opacity = 1;

  setTimeout(function () {
    toast.style.width = autoHeight + 'px';
    toast.style.height = autoHeight + 'px';
    toast.style.marginBottom = 0;
    toast.style.marginRight = 0;
    toast.style.paddingTop = paddT;
    toast.style.paddingBottom = paddT;
    toast.style.paddingLeft = paddL;
    toast.style.paddingRight = paddL;
    toast.style.borderRadius = bVar.modulor * 3 + 'px';

    setTimeout(function () {
      toast.style.width = autoWidth + 'px';
      toast.style.height = autoHeight + 'px';
      toast.style.borderRadius = autoHeight / 2 + 'px';
      setTimeout(function () {
        let toastContent = document.querySelector('.m-tst-wrp');
        toastContent.style.opacity = 1;
      }, 1000);
    }, 500);
  }, 0);

  // Déclencher la réinitialisation après un délai fixe
  window.toastTimeout = setTimeout(function () {
    detoast();
  }, 4000);
}