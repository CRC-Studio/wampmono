<?php

/**
 * Fonction set_update_json()
 * 
 * Écrit les données dans le fichier update.json
 */

function set_update_json(array $data): bool
{
  $jsonPath = __DIR__ . '/../content/update/update.json';

  // Vérifie que les données sont valides
  if (empty($data) || !is_array($data)) {
    echo "Données JSON invalides ou vides.\n";
    return false;
  }

  // Vérifie l'existence du fichier
  if (!file_exists($jsonPath)) {
    echo "Fichier JSON introuvable : $jsonPath\n";
    return false;
  }

  // Encodage JSON avec options lisibles
  $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  if ($json === false) {
    echo "Erreur lors de l'encodage JSON.\n";
    return false;
  }

  // Écriture dans le fichier
  $result = file_put_contents($jsonPath, $json);
  if ($result === false) {
    echo "Échec de l'écriture dans le fichier.\n";
    return false;
  }

  return true;
}
