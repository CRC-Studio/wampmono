<?php

/**
 * Fonction get_update_local_config_apache()
 * 
 * Permet de récupérer la version de Adminer actuellement
 * installer sur WampServer
 * 
 * Exemple de PHP :
 *   $apacheVer = get_update_local_config_apache();
 */

function get_update_local_config_apache(string $configPath = 'C:/wamp64/wampmanager.conf'): ?string
{
    if (!file_exists($configPath)) {
        return null;
    }

    $parsed = parse_ini_file($configPath, true, INI_SCANNER_RAW);
    if (!isset($parsed['apache']['apacheVersion'])) {
        return null;
    }

    return trim(trim($parsed['apache']['apacheVersion']), '"');
}
