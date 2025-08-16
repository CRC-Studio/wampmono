<?php

// Permet de récupérer l'order d'un lien de l'utilisateur
//
// Exemple de PHP :
//   $tools = get_tools() {;
//   foreach ($tools as $tool) { 
//     $order = get_tool_order($tool);
//   }


function get_tool_order($tool)
{
  return $tool['ORDER'] ?? '';
}
