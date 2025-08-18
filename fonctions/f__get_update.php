<?php

/**
 * Fonction get_update()
 * 
 * Vérifie si de nouvelles versions de WampServer ou WampMono
 * ont été mise en ligne.
 * 
 */

function get_update()
{

  // Récupère les data
  $data = get_update_json();
  if ($data === null) {
    return null;
  }

  // Vérifie la date du dernier check
  $lastCheck = $data['LASTCHECK'] ?? 0;
  if (is_update_check_recent($lastCheck)) {
    return;
  }

  // Récupère les dernières versions en ligne
  $localConfig = get_update_local_config();
  $latestWampMono = get_update_latest_wampmono();
  $latestWampServer = get_update_latest_wampserver();

  // Met à jour les données dans LATESTONLINE
  $data['LOCALCONFIG'] = $localConfig['LOCALCONFIG'];
  $data['LATESTONLINE'][0]['WAMPMONO'] = $latestWampMono;
  $data['LATESTONLINE'][0]['WAMPSERVER'] = $latestWampServer;

  // Met à jour la date du dernier check
  $data['LASTCHECK'] = time();

  // Sauvegarde le JSON mis à jour
  set_update_json($data);
}
