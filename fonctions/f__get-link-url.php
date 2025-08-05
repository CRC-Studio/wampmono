<?php

// Permet de récupérer l'URL d'un lien de l'utilisateur
//
// Exemple de PHP :
//   $links = get_links() {;
//   foreach ($links as $link) { 
//     $url = get_link_url($link);
//   }


function get_link_url($link)
{
  return $link['URL'] ?? '';
}
