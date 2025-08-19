<?php

/**
 * Fonction get_update_diff()
 * 
 * Compare les versions dispo en ligne
 * des version local
 * 
 */

function get_update_diff(): ?array
{
  $updates = [];

  // Mets à jour le fichier update.json
  get_update();

  // Récupère les données JSON
  $data = get_update_json();
  if ($data === null) {
    return null;
  }

  // Comparaison des composants WampServer
  $localWamp = $data['LOCALCONFIG'][0]['WAMPSERVER'] ?? [];
  $onlineWamp = $data['LATESTONLINE'][0]['WAMPSERVER'] ?? [];

  foreach ($onlineWamp as $component => $latestVersion) {
    $localVersion = $localWamp[$component] ?? null;

    if ($localVersion === null) {
      $updates[$component] = [
        'local' => null,
        'latest' => $latestVersion,
        'status' => 'missing'
      ];
      continue;
    }

    if (version_compare($localVersion, $latestVersion, '<')) {
      $updates[$component] = [
        'local' => $localVersion,
        'latest' => $latestVersion,
        'status' => 'update available'
      ];
    }
  }

  // Comparaison de WampMono
  $localMono = $data['LOCALCONFIG'][0]['WAMPMONO'] ?? null;
  $onlineMono = $data['LATESTONLINE'][0]['WAMPMONO'] ?? null;

  if ($localMono && $onlineMono) {
    $localBuild = strtotime($localMono['BUILD']);
    $onlineBuild = strtotime($onlineMono['BUILD']);

    if ($onlineBuild > $localBuild) {
      $updates['WAMPMONO'] = [
        'local' => $localMono['BUILD'],
        'latest' => $onlineMono['BUILD'],
        'status' => 'update available'
      ];
    }
  }

  // Retourne le résultat au template
  return empty($updates) ? false : $updates;
}
