<?php

/**
 * Fonction get_update_json()
 * 
 * Permet de récupérer les data dans le fichier update.jon
 * 
 */

function get_update_json()
{
  $jsonPath = __DIR__ . '/../content/update/update.json';

  // Vérification de l'existence du fichier
  if (!file_exists($jsonPath)) {
    echo "Fichier JSON introuvable : $jsonPath\n";
    return null;
  }

  // Lecture du contenu
  $jsonContent = file_get_contents($jsonPath);
  if ($jsonContent === false) {
    echo "Erreur lors de la lecture du fichier JSON.\n";
    return null;
  }

  // Décodage du JSON
  $data = json_decode($jsonContent, true);
  if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Erreur de décodage JSON : " . json_last_error_msg() . "\n";
    return null;
  }

  return $data;
}
