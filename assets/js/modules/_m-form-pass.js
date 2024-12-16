/**
* Module : Form pass
*/

// Import les effets

import * as eFade from '../effets/_e-fade';

// Affiche ou cache le mot de passe

export const formPassToggle = (e) => {

  // Sélectionne les éléments
  let $field = e.target.closest('.m-frm-psw');
  let $pswInput = $field.querySelector('input');
  let $pswIco = $field.querySelector('.m-frm-psw-ico');


  // Affiche le mot de passe
  if ($pswInput.type == 'password') {
    $pswInput.type = 'text';
    $pswIco.classList.add('is--toggle');

    // Cache le mot de passe
  } else if ($pswInput.type == 'text') {
    $pswInput.type = 'password';
    $pswIco.classList.remove('is--toggle');
  }
};

// Affiche ou cache le mot de passe

export const formPassFocus = (e) => {

  // Sélectionne les éléments
  let $field = e.target.closest('.m-frm-psw');
  let $pswIco = $field.querySelector('.m-frm-psw-ico');

  // Fait apparaitre l'icone
  eFade.fadeIn($pswIco);
};

// Initialise le module

let $pswInput, $pswIco;
export const formPassInit = () => {
  // Sélectionne les inputs password
  let $fields = document.querySelectorAll('.m-frm-psw');
  $fields.forEach($field => {
    // Sélectionne qq éléments
    $pswInput = $field.querySelector('input');
    $pswIco = $field.querySelector('.m-frm-psw-ico');

    if ($pswInput) {
      // Ajoute un événement au focus
      $pswInput.removeEventListener('focus', formPassFocus);
      $pswInput.addEventListener('focus', formPassFocus);
    }

    if ($pswIco) {
      // Ajoute un événement au click
      $pswIco.removeEventListener('click', formPassToggle);
      $pswIco.addEventListener('click', formPassToggle);
    }
  });
};
formPassInit();