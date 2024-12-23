/**
 * Module : Search
*/



/**
 * Permet de faire des recherches
*/

export const searchAndHide = (string, $els) => {
  $els.forEach($el => {
    // Récupére le contenu de l'élèment
    let content = $el.innerHTML;
    content = content.toString();
    // Convertie tout en bas de case pour comparer plus facilement
    content = content.toLowerCase();
    string = string.toLowerCase();

    // Compare le contenu de l'élèment et la chaine de caractère
    if (content.indexOf(string) !== -1) {
      $el.style.display = 'block';
    } else {
      $el.style.display = 'none';
    }
  });
};


/**
* Permet d'utiliser la Search bar
*/

export const searchEl = () => {
  if ($search) {
    let string = $search.value;

    if (string && $els) {
      searchAndHide(string, $els);
    }
  }
}


/**
 * Initialisation
*/

let $search, $els;
export const searchInit = () => {
  $search = document.querySelector('.m-sch-inp');
  $els = document.querySelectorAll('.l-ftp-vhost');

  if ($search) {
    $search.removeEventListener('keyup', searchEl);
    $search.addEventListener('keyup', searchEl);
  };
}
searchInit();