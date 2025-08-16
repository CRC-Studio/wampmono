<?php

// Permet de récupérer le title d'un lien de l'utilisateur
//
// Exemple de PHP :
//   $tools = get_tools() {;
//   foreach ($tools as $tool) { 
//     $title = get_tool_title($tool);
//   }


function get_tool_title($tool)
{
  return $tool['TITLE'] ?? '';
}
