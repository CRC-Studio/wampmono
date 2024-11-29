<?php

// Ce fichier permet de centraliser toutes les fonctions
// exécuté côté serveur pour fabriquer les pages HTML
// C'est peut-être le plus important de tous.


/**
 * Fonction Auto Include
 */


function auto_include()
{
  // Ajoute qq variable
  $dossier = __DIR__ . '/fonctions/';

  // Cherches les fichiers dans le dossier
  $files = scandir($dossier);

  foreach ($files as $file) {
    // Vérifier si le fichier est un fichier PHP
    if (pathinfo($file, PATHINFO_EXTENSION) == 'php') {
      require $dossier . $file;
    }
  }
}
auto_include();
