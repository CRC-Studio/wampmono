/**
* Ajax
*/

// Import les fonctions Ajax

import * as bVar from '../base/_b-var.js';

/**
* Fonction : newAjaxRequest()
*
* Permet de centraliser tous les call en AJAX
*/

export const newAjaxRequest = (params, action, successCallback, errorCallback) => {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', bVar.home_url + "/wp-admin/admin-ajax.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = () => {
    if (xhr.status === 200) {
      successCallback(xhr.responseText);
    }
  };
  xhr.onerror = (error) => {
    errorCallback(error);
  };

  let query = 'action=' + action;
  for (let key in params) {
    if (params.hasOwnProperty(key)) {
      query += '&' + key + '=' + encodeURIComponent(params[key]);
    }
  }
  xhr.send(query);
}


/**
* Fonction : ajaxUpdateDOM()
*
* Permet de modifier le DOM après un call AJAX
*/

export const ajaxUpdateDOM = (data) => {
  // Formate la réponse pour être utilisée par JavaScript
  data = JSON.parse(data);
  // Modifie le DOM
  Object.keys(data).forEach((key) => {
    let elements = document.querySelectorAll(key);
    elements.forEach(el => {
      el.outerHTML = data[key];
    });
  });
}


/**
* Initialisation de quelques fonctions
* après un call AJAX
*/

// Variables à Redéclarer après AJAX
// let var1, var2, var3

export const initAfterAjax = () => {
  // Dispatch l'event initAfterAjax
  document.dispatchEvent(new CustomEvent('initAfterAjax'));

  // Redéclare les variables
  // var1 = 'something';
  // var2 = '42';

  // Relance des fonctions
  //exemple();
};
initAfterAjax();