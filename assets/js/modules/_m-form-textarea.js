/**
* Module : Form Textarea
*/

// Permet de changer la taille des textarea

export const formTextareaAutoGrow = (e) => {
  let $el = e.target;
  $el.style.height = ($el.scrollHeight) + "px";
}

// Initialise le module

let $textareas;
export const formTextareaInit = () => {
  // Sélectionne les Textarea
  $textareas = document.querySelectorAll('.m-frm textarea');

  // Ajoute un événement au focus
  $textareas.forEach($textarea => {
    $textarea.removeEventListener('input', formTextareaAutoGrow);
    $textarea.addEventListener('input', formTextareaAutoGrow);

    // Ajuste la hauteur initialement
    $textarea.style.height = ($textarea.scrollHeight) + "px";
  });
};
formTextareaInit();