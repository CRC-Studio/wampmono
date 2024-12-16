/**
 * Module : Form Autosave
 */

export const formAutoRestore = () => {
  const savedData = localStorage.getItem('formData');
  let $forms = document.querySelectorAll('.m-frm');

  if (savedData) {
    const data = JSON.parse(savedData);
    $forms.forEach($form => {
      let $inputs = $form.querySelectorAll('input');
      $inputs.forEach($input => {
        if (!$input.value && data[$input.name]) {
          $input.value = data[$input.name];
        }
      });
    });
  }
}
formAutoRestore();


// Permet de sauver le contenu du formulaire

export const formAutoSave = (e) => {
  let $form = e.target.closest('.m-frm');

  if ($form) {
    const formData = new FormData($form);
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value;
    });
    localStorage.setItem('formData', JSON.stringify(data));
  }
}


// Initialise le module

export let $forms, $inputs;
export const formAutoSaveInit = () => {

  $forms = document.querySelectorAll('.m-frm');

  $forms.forEach($form => {
    $inputs = $form.querySelectorAll('input');
    $inputs.forEach($input => {
      $input.removeEventListener('input', formAutoSave);
      $input.addEventListener('input', formAutoSave);
    });
  });

  // Réinitialise le module après un chargement Ajax
  document.addEventListener('initAfterAjax', formAutoSaveInit);
}
formAutoSaveInit();