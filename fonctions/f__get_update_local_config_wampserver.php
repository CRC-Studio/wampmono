<?php

/**
 * Fonction get_update_local_config_wampserver()
 * 
 * Permet de récupérer la version de Adminer actuellement
 * installer sur WampServer
 * 
 * Exemple de PHP :
 *   $WampserverVer = get_update_local_config_wampserver();
 */

function get_update_local_config_wampserver(string $configPath = 'C:/wamp64/wampmanager.conf'): ?string
{
    if (!file_exists($configPath)) {
        return null;
    }

    $parsed = parse_ini_file($configPath, true, INI_SCANNER_RAW);
    if (!isset($parsed['main']['wampserverVersion'])) {
        return null;
    }

    return trim(trim($parsed['main']['wampserverVersion']), '"');
}
