/**
 * Layout : Frontpage
*
*/

// Permet d'ajouter des liens

export const linksAdd = (e) => {
  e.preventDefault();
  const $container = document.querySelector(".m-frm-lnks");
  const $links = $container.querySelectorAll(".m-frm-lnk");
  let lastOrder = 0;
  if ($links.length) {
    lastOrder = Math.max(...[...$links].map(div => parseInt(div.id.replace('lnk-', ''), 10)));
  }
  const newOrder = lastOrder + 1;

  const $clone = $linkTemplate.cloneNode(true);
  $clone.id = `lnk-${newOrder}`;
  $clone.style.display = "flex";

  $clone.querySelectorAll("button[data-id]").forEach(btn => btn.dataset.id = `lnk-${newOrder}`);

  $clone.querySelectorAll("label").forEach(label => {
    const forAttr = label.getAttribute("for");
    if (forAttr) {
      label.setAttribute("for", forAttr.replace(/0$/, newOrder));
    }
  });

  $clone.querySelectorAll("input").forEach(input => {
    input.name = input.name.replace(/0$/, newOrder);
    input.value = "";
  });

  $container.appendChild($clone);
}


// Permet de supprimer des liens

export const linksDelete = (e) => {
  e.preventDefault();
  const $btn = e.currentTarget;
  const id = $btn.dataset.id;
  const $target = document.getElementById(id);
  if ($target) $target.remove();
}

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
  let $btnAdd = document.querySelector(".m-btn-add");
  if ($btnAdd) {
    $btnAdd.removeEventListener('click', linksAdd);
    $btnAdd.addEventListener('click', linksAdd);
  };


  // Permet de supprimer un lien
  let $btnsSup = document.querySelectorAll(".m-btn-sup");
  $btnsSup.forEach(($btn) => {
    $btn.removeEventListener('click', linksDelete);
    $btn.addEventListener('click', linksDelete);
  });
};
linksInit();