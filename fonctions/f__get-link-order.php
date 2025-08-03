<?php

// Permet de récupérer l'order d'un lien de l'utilisateur
//
// Exemple de PHP :
//   $links = get_links() {;
//   foreach ($links as $link) { 
//     $order = get_link_order($link);
//   }


function get_link_order($link)
{
  return $link['ORDER'] ?? '';
}
