/**
 * Layout : Frontpage
*
*/

// Ajoute des modules

import * as eFade from '../effets/_e-fade.js';

export const ftpInit = () => {
  let $head = document.querySelector(".l-ftp-top");
  let $fold = document.querySelector(".l-ftp-flds");
  let $tools = document.querySelector(".l-ftp-lnks");
  let $foot = document.querySelector(".l-fot-wrp");

  eFade.fadeIn($head, 2000, 1000);
  eFade.fadeIn($fold, 2000, 1500);
  eFade.fadeIn($tools, 2000, 2000);

  setTimeout(function () {
    $tools.classList.toggle('e-on');
  }, 2500);

  eFade.fadeIn($foot, 2000, 2500);

}
ftpInit();