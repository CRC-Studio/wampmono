/**
* Fonction : newAjaxRequest()
*
* Permet de centraliser tous les call en AJAX
*/

export const newAjaxRequest = (params, action, successCallback, errorCallback) => {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', action, true);
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
  try {
    // Formate la réponse pour être utilisée par JavaScript
    data = JSON.parse(data);

    // Modifie le DOM ou met à jour des variables JS en fonction du préfixe de la clé
    Object.entries(data).forEach(([key, value]) => {
      if (key.startsWith('.') || key.startsWith('#')) {
        // Si la clé commence par '.' ou '#', modifie le DOM
        document.querySelectorAll(key).forEach($el => {
          $el.outerHTML = value;
        });
      } else {
        // Mettre à jour la variable globale
        bVar.globalVars[key] = data[key];
      }
    });
  } catch (e) {
    console.error(data);
  }
};


/**
* Initialisation de quelques fonctions
* après un call AJAX
*/

// Variables à Redéclarer après AJAX
// let var1, var2, var3

export const initAfterAjax = () => {
  // Dispatch l'event initAfterAjax
  document.dispatchEvent(new CustomEvent('initAfterAjax'));
};
initAfterAjax();