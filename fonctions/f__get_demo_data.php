<?php

/**
 * Fonction get_demo_data()
 * 
 * Permet d'afficher les info si Wampmono
 * est en mode demo
 * 
 * Exemple de PHP
 *   function get_update_json()
 *   {
 *       if (WAMPMONO_DEMO_MODE) {
 *           return get_demo_data('update.json');
 *       }
 *  
 *       // Comportement réel
 *       ...
 *   }
 *
 */

function get_demo_data($filename)
{
  $json_path = __DIR__ . "/../content/demo/demo_{$filename}";
  if (!file_exists($json_path)) return null;

  return json_decode(file_get_contents($json_path), true);
}
