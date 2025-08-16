<?php

// Permet de récupérer les Liens de l'utilisateur
//
// Exemple de PHP :
//   $tools = get_tools() {;
//   foreach ($tools as $tool) { 
//     echo  '<a href="'.get_tool_url($tool).'" target="_blank">'.get_tool_title($tool).'</a>';
//   }


function get_tools()
{
  $json_path = __DIR__ . '/../content/tools/tools.json';
  if (!file_exists($json_path)) return [];

  $data = json_decode(file_get_contents($json_path), true);
  return !empty($data['TOOLS']) ? $data['TOOLS'] : false;
}
