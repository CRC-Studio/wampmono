<?php

// Permet de récupérer le title d'un lien de l'utilisateur
//
// Exemple de PHP :
//   $links = get_links() {;
//   foreach ($links as $link) { 
//     $title = get_link_title($link);
//   }


function get_link_title($link)
{
  return $link['TITLE'] ?? '';
}
