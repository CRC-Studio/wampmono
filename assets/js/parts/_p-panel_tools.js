/**
 * Part : Panel Edit Tool
*
*/

// Ajoute les modules

import * as mInputChecker from '../modules/_m-input-checker.js';
import * as mFormChecker from '../modules/_m-form-checker.js';
import * as mFormLabel from '../modules/_m-form-label.js';
import * as mModal from '../modules/_m-modal.js';


// Permet d'ajouter des liens

export const linksAdd = (e) => {
  e.preventDefault();

  const $container = document.querySelector(".m-frm-lnks");
  const $links = $container.querySelectorAll(".m-frm-lnk");
  let lastOrder = 0;

  // Récupère le nouvel ID
  if ($links.length) {
    lastOrder = Math.max(...[...$links].map(div => parseInt(div.id.replace('lnk-', ''), 10)));
  }
  const newOrder = lastOrder + 1;

  // Clone les Inputs
  const $clone = $linkTemplate.cloneNode(true);
  $clone.id = `lnk-${newOrder}`;
  $clone.style.display = "flex";

  $clone.querySelectorAll("[data-id]").forEach(el => {
    if (el.dataset.id === "lnk-0") {
      el.dataset.id = `lnk-${newOrder}`;
    }
  });

  $clone.querySelectorAll("label").forEach(label => {
    const forAttr = label.getAttribute("for");
    if (forAttr) {
      label.setAttribute("for", forAttr.replace(/0$/, newOrder));
    }
  });

  // Remplace les ID
  $clone.querySelectorAll("input").forEach(input => {
    input.name = input.name.replace(/0$/, newOrder);
    input.value = "";
  });

  // Ajoutes les Inputs
  $container.appendChild($clone);

  // Relance quelques fonctions
  linksInit();
}


// Permet de supprimer des liens

export const linksDelete = async (e) => {
  e.preventDefault();
  const $btn = e.currentTarget;
  const id = $btn.dataset.id;
  const $target = document.getElementById(id);
  if (!$target) return;

  try {
    await confirmModal();
    $target.remove();
    mModal.modalHide();
  } catch {
    console.log('Suppression annulée');
  }

  // Affiche ou nom le msg "aucun tool"
  linksEmptyMsg();
};


export const confirmModal = () => {
  return new Promise((resolve, reject) => {
    // Affiche la modale
    mModal.modalShow('cfr');

    // Cible les boutons
    const $yes = document.getElementById('m-mdl-yes');
    const $close = document.querySelector('.m-mdl-cls');

    // Nettoyage des listeners
    const cleanUp = () => {
      $yes.removeEventListener('click', onYes);
      $close.removeEventListener('click', onCancel);
      document.removeEventListener('modalHide', onCancel);
    };

    const onYes = () => {
      cleanUp();
      resolve(true);
    };

    const onCancel = () => {
      cleanUp();
      reject(false);
    };

    $yes.addEventListener('click', onYes);
    $close.addEventListener('click', onCancel);
    document.addEventListener('modalHide', onCancel);
  });
};

// Permet d'afficher ou non la div avec le message
// si aucun lien n'est trouvé

export const linksEmptyMsg = () => {

  const $links = document.querySelectorAll(".m-frm-lnk");
  const $msg = document.querySelector(".m-pnl-empt");

  // Afficher ou masquer le message
  $msg.style.display = $links.length <= 0 ? "flex" : "none";
};


// Permet de Drag & Drop

let dragged = null;

export const linksDragInit = () => {
  const $links = document.querySelectorAll(".m-frm-lnk");

  $links.forEach($link => {
    $link.addEventListener("dragstart", (e) => {
      dragged = $link;
      e.dataTransfer.effectAllowed = "move";
    });

    $link.addEventListener("dragover", (e) => {
      e.preventDefault();
      e.dataTransfer.dropEffect = "move";
    });

    $link.addEventListener("drop", (e) => {
      e.preventDefault();
      if (dragged && dragged !== $link) {
        const $container = document.querySelector(".m-frm-lnks");
        const draggedIndex = [...$container.children].indexOf(dragged);
        const targetIndex = [...$container.children].indexOf($link);
        if (draggedIndex < targetIndex) {
          $container.insertBefore(dragged, $link.nextSibling);
        } else {
          $container.insertBefore(dragged, $link);
        }
      }
    });
  });
};


// Initialisation du module

let $linkTemplate;
export const linksInit = () => {
  // Copie, puis supprime le template de lien
  const $originalTemplate = document.querySelector("#lnk-0");
  if ($originalTemplate) {
    $linkTemplate = $originalTemplate.cloneNode(true);
    $originalTemplate.remove(); // supprime du DOM
  }

  // Permet d'ajouter un lien
  let $btnAdds = document.querySelectorAll(".m-btn-add");
  $btnAdds.forEach(($btnAdd) => {
    $btnAdd.removeEventListener('click', linksAdd);
    $btnAdd.addEventListener('click', linksAdd);
  });


  // Permet de supprimer un lien
  let $btnsSup = document.querySelectorAll(".m-btn-sup");
  $btnsSup.forEach(($btn) => {
    $btn.removeEventListener('click', linksDelete);
    $btn.addEventListener('click', linksDelete);
  });

  // Ajoute le Drag & Drop
  linksDragInit();

  // Affiche ou nom le msg "aucun tool"
  linksEmptyMsg();

  // Relance quelques fonctions
  mInputChecker.inputCheckerInit();
  mFormChecker.formCheckerInit();
  mFormLabel.formLabelInit();

};
linksInit();