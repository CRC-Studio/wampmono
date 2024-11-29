<?php

// Permet de récupérer les alias de Wamp
//
// Exemple de PHP :
//   $alias = get_alias();
//   foreach ($alias as $aliasData) { 
//     echo "<a href='{$aliasData['url']}' class='m-body'>{$aliasData['name']}</a><br>";
//   }

function get_alias()
{
  // Chemin vers le dossier des alias
  $aliasDir = __DIR__ . '/../../../alias';

  // Vérifie si le dossier existe
  if (!is_dir($aliasDir)) {
    return [];
  }

  // Récupère tous les fichiers du dossier, sauf "." et ".."
  $aliasFiles = array_diff(scandir($aliasDir), ['.', '..']);

  // Construit les données des alias
  $aliases = [];
  foreach ($aliasFiles as $file) {
    $aliasName = pathinfo($file, PATHINFO_FILENAME); // Nom de l'alias
    $aliases[] = [
      'name' => $aliasName,
      'url' => "http://localhost/" . $aliasName . "/", // URL de l'alias
    ];
  }

  return $aliases; // Retourne un tableau associatif des alias
}
