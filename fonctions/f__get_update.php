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

  // Vérifie si Wampmono est en mode Demo
  if (WAMPMONO_DEMO_MODE) {
    return;
  }

  // Récupère les data
  $data = get_update_json();
  if ($data === null) {
    return null;
  }

  // Vérifie la date du dernier check
  $lastCheck = $data['LASTCHECK'] ?? 0;
  if (!is_update_check_recent($lastCheck)) {
    // Met à jour la date du dernier check
    $data['LASTCHECK'] = time();

    // Récupère les dernières versions en ligne
    $latestWampMono = get_update_latest_wampmono();
    $latestWampServer = get_update_latest_wampserver();

    //Formate les données
    $data['LATESTONLINE'][0]['WAMPMONO'] = $latestWampMono;
    $data['LATESTONLINE'][0]['WAMPSERVER'] = $latestWampServer;
  }

  // Récupère les versions en local
  $localConfig = get_update_local_config();
  $data['LOCALCONFIG'] = $localConfig['LOCALCONFIG'];

  // Sauvegarde le JSON mis à jour
  set_update_json($data);
}
