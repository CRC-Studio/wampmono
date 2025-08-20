<?php

/**
 * Fonction get_demo_data()
 * 
 * Permet de récupérer les class du <body>
 * 
 * Exemple de PHP
 *   <body class="<?= get_body_class() ?>">
 *
 */


function get_body_class()
{
  // Ajoute quelques variables
  $bodyClass = "";

  // Formate les class du <body> et selectionne le template
  $bodyClass = (is_demo_mode()) ? 'l-body l-dem' : 'l-body';
  $bodyClass .= ' m-flc';

  // Retourne le résultat au template
  return $bodyClass;
}
