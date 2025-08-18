<?php

/**
 * Fonction get_update_local_config_traymenumanager()
 * 
 * Permet de récupérer la version de phpMyAdmin actuellement
 * installer sur WampServer
 * 
 * Exemple de PHP :
 *   $trayMenuManagerVer = get_update_local_config_traymenumanager();
 */

function get_update_local_config_traymenumanager(string $iniPath = 'C:/wamp64/wampmanager.ini'): ?string
{
    if (!file_exists($iniPath)) {
        return null;
    }

    $contents = file_get_contents($iniPath);
    if ($contents === false) {
        return null;
    }

    // On cherche la ligne "Tray Menu Manager Version=3.2.6.7"
    if (preg_match('/Tray Menu Manager Version\s*=\s*([^\r\n]+)/i', $contents, $matches)) {
        return trim($matches[1]);
    }

    return null;
}
