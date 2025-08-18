<?php

/**
 * Fonction get_update_local_config()
 * 
 * Permet de récupérer la config actuel WampServer et Wampmono
  
 * Exemple de PHP :
 *   $localConfig = get_update_local_config();
 */

function get_update_local_config(): array
{
    // Ajoute quelques variables
    $localConfig = [];

    // Lecture du commit WAMPMONO depuis VERSION
    $wampMonoData = [
        'SUMMARY' => 'unknown',
        'BUILD' => 'unknown',
        'COMMIT' => 'unknown'
    ];

    $versionFile = __DIR__ . '/../VERSION';
    $versionFile = __DIR__ . '/../VERSION';
    if (file_exists($versionFile)) {
        $content = file_get_contents($versionFile);
        $json = json_decode($content, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            $wampMonoData['SUMMARY'] = $json['SUMMARY'] ?? 'unknown';
            $wampMonoData['BUILD'] = $json['BUILD'] ?? 'unknown';
            $wampMonoData['COMMIT'] = $json['COMMIT'] ?? 'unknown';
        } else {
            $wampMonoData['SUMMARY'] = 'Format JSON invalide';
        }
    }

    // Lecture des versions locales des composants WampServer
    $wampServerData = [
        'WAMPSERVER' => get_update_local_config_wampserver() ?? 'unknown',
        'APACHE' => get_update_local_config_apache() ?? 'unknown',
        'PHP' => get_update_local_config_php() ?? 'unknown',
        'TRAYMENUMANAGER' => get_update_local_config_traymenumanager() ?? 'unknown',
        'ADMINER' => get_update_local_config_adminer() ?? 'unknown',
        'PHPMYADMIN' => get_update_local_config_phpmyadmin()
    ];


    // Formate le résultat
    $localConfig = [
        'LOCALCONFIG' => [
            [
                'WAMPMONO' => $wampMonoData,
                'WAMPSERVER' => $wampServerData
            ]
        ]
    ];

    // Retourne le resultat au template
    return $localConfig;
}
