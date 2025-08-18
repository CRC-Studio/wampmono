<?php

/**
 * Fonction get_update_local_config_php()
 * 
 * Permet de récupérer la version de Adminer actuellement
 * installer sur WampServer
 * 
 * Exemple de PHP :
 *   $phpVer = get_update_local_config_php();
 */

function get_update_local_config_php(string $configPath = 'C:/wamp64/wampmanager.conf'): ?string
{
    if (!file_exists($configPath)) {
        return null;
    }

    $parsed = parse_ini_file($configPath, true, INI_SCANNER_RAW);
    if (!isset($parsed['php']['phpVersion'])) {
        return null;
    }

    return trim(trim($parsed['php']['phpVersion']), '"');
}
