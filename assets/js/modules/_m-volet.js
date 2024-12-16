/**
* Module : Volet
*/


export const voletHandleClick = (e) => {
  e.preventDefault();

  // Selectionne le volet à ouvrir
  voletId = e.currentTarget.getAttribute('data-vltid');
  $volet = document.getElementById(voletId);

  // Affiche ou non le volet
  if ($volet.classList.contains('e-on')) {
    // Dispatch l'event requestmOverlayHide
    document.dispatchEvent(new CustomEvent('requestmOverlayHide'));
  } else {
    voletShow();
  }
}

// Affiche ou cache le module

export const voletShow = () => {
  voletHide();
  $volet.classList.add('e-on');

  // Modifie au besoin le btn Nav
  if ($volet.classList.contains('l-hdr-nav')) {
    let $navBtn = document.querySelector('.nav-btn');
    $navBtn.classList.add('e-on');
  }


  // Dispatch l'event requestmOverlayShow
  document.dispatchEvent(new CustomEvent('requestmOverlayShow'));
};

export const voletHide = () => {
  $volets.forEach($volet => {
    $volet.classList.remove('e-on');

    // Modifie au besoin le btn Nav
    if ($volet.classList.contains('l-hdr-nav')) {
      let $navBtn = document.querySelector('.nav-btn');
      $navBtn.classList.remove('e-on');
    }

  });
}

// Initialise le module

export let $volets, $volet, $voletBtns, voletId;
export const voletInit = () => {
  // Sélectionne les volets et les boutons
  $volets = document.querySelectorAll('.m-vlt');
  $voletBtns = document.querySelectorAll('.m-vlt-btn');

  $voletBtns.forEach($voletBtn => {
    $voletBtn.removeEventListener('click', voletHandleClick);
    $voletBtn.addEventListener('click', voletHandleClick);
  });

  // Ferme le volet si l'overlay est fermé
  document.removeEventListener('mOverlayHide', voletHide);
  document.addEventListener('mOverlayHide', voletHide);
}
voletInit();


// Ouvre le volet au chargement d'une page si le parametre mv est open

export const voletAutoShow = () => {
  const urlParams = new URLSearchParams(window.location.search);
  const mvParam = urlParams.get('mv');
  if (mvParam) {
    let voletId = 'm-vlt-' + mvParam;
    $volet = document.getElementById(voletId);
    voletShow();
  }
};
voletAutoShow();