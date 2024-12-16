/**
* Module : Toast
*/


export const detoast = () => {
  var toast = document.querySelector('.m-toast');
  toast.style.display = 'none';
}

/**
* Permet d'afficher un toat
*/


export const toast = (msg) => {
  var toastContent = document.querySelector('.m-toast__content');
  toastContent.textContent = msg;

  var toast = document.querySelector('.m-toast');
  var autoWidth = toast.offsetWidth;
  var autoHeight = toast.offsetHeight;
  var paddT = window.getComputedStyle(toast).paddingTop;
  var paddL = window.getComputedStyle(toast).paddingLeft;

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
    toast.style.borderRadius = modulor * 3 + 'px';

    setTimeout(function () {
      toast.style.width = autoWidth + 'px';
      toast.style.height = autoHeight + 'px';
      toast.style.borderRadius = autoHeight / 2 + 'px';
      setTimeout(function () {
        var toastContent = document.querySelector('.m-toast__content');
        toastContent.style.opacity = 1;
      }, 1000);
    }, 500);
  }, 0);
}