<?php

// Permet de récupérer les Liens de l'utilisateur
//
// Exemple de PHP :
//   $links = get_links() {;
//   foreach ($links as $link) { 
//     echo  '<a href="'.get_link_url($link).'" target="_blank">'.get_link_title($link).'</a>';
//   }


function get_links()
{
  $json_path = __DIR__ . '/../content/links/links.json';
  if (!file_exists($json_path)) return [];

  $data = json_decode(file_get_contents($json_path), true);
  return $data['LINKS'] ?? [];
}
