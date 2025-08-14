<?php

// Ce fichier permet de centraliser toutes les fonctions
// exécuté côté serveur pour fabriquer les pages HTML
// C'est peut-être le plus important de tous.


/**
 * Auto Include
 */


function auto_include($dir = null)
{
  // Ajoute qq variable
  $dir = __DIR__ . '/fonctions/';

  // Vérifie que le dossier existe
  if (!is_dir($dir)) return;

  // Cherche les fichiers dans le dossier
  $items = scandir($dir);

  // Ajoute les fichiers du dossier et sous-dossier
  foreach ($items as $item) {
    if ($item === '.' || $item === '..') continue;

    $path = $dir . DIRECTORY_SEPARATOR . $item;

    if (is_dir($path)) {
      // Appel récursif
      auto_include($path);
    } elseif (str_starts_with($item, 'f__') && pathinfo($item, PATHINFO_EXTENSION) === 'php') {
      require $path;
    }
  }
}
auto_include();
