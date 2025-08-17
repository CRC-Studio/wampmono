/**
 * Module : Menu (Monowamp™ version simplifiée)
 */

const hideMenu = () => {
  const $menus = document.querySelectorAll('.m-men-itms, .m-men');
  $menus.forEach($menu => {
    $menu.classList.remove('e-on');
  });
};



export const menuInit = () => {

  let $menu;
  let $menuBtns;
  let $menuParent;

  $menuBtns = document.querySelectorAll('.m-men-btn');

  $menuBtns.forEach($btn => {
    $btn.addEventListener('click', e => {

      e.preventDefault();
      e.stopPropagation();

      // Trouve le menu associé (le plus proche dans le DOM)
      $menuParent = $btn.closest('.m-men');
      $menu = $menuParent.querySelector('.m-men-itms');
      if (!$menu) return;

      // Si le menu est déjà ouvert, on le ferme
      if ($menuParent.classList.contains('e-on')) {
        hideMenu();
        return;
      }

      // Affiche le menu
      hideMenu();
      $menu.classList.add('e-on');
      $menuParent.classList.add('e-on');

      // Ferme le menu si on clique ailleurs
      document.addEventListener('click', hideMenu, { once: true });
    });
  });
};
menuInit();