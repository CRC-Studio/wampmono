<?php

// Permet de récupérer l'URL d'un lien de l'utilisateur
//
// Exemple de PHP :
//   $tools = get_tools() {;
//   foreach ($tools as $tool) { 
//     $url = get_tool_url($tool);
//   }


function get_tool_url($tool)
{
  return $tool['URL'] ?? '';
}
