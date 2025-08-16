<?php

// Ce fichier permet de simplifier le fichier header.php
// en séparant la logique du template


/**
 * Ajoute le support du dossier Favicon
 */

function get_fav_path()
{
  // Formate le résultat
  $fav_path = get_home_url();
  $fav_path .= '/assets/favicon';

  // Retourne le résultat au Template
  return $fav_path;
};
