<?php

// Permet de récupérer les alias de Wamp
//
// Exemple de PHP :
//   $projects = get_projects();
//   foreach ($projects as $projectData) { 
//     echo "<a href='{$projectData['url']}' class='m-body'>{$projectData['name']}</a><br>";
//   }

function get_projects()
{
  // Ajoute qq variables
  $projects = [];

  // Chemin vers le dossier des alias
  $projectsDir = __DIR__ . '/../../';

  if (is_dir($projectsDir)) {
    foreach (scandir($projectsDir) as $item) {
      if ($item !== '.' && $item !== '..' && is_dir($projectsDir . $item)) {
        $projects[] = [
          'name' => $item,
          'url' => 'http://localhost/' . $item,
        ];
      }
    }
  }
  return $projects;
}
