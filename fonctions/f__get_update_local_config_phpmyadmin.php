<?php

/**
 * Fonction get_update_local_config_phpmyadmin()
 * 
 * Permet de récupérer la version de phpMyAdmin actuellement
 * installer sur WampServer
 * 
 * Exemple de PHP :
 *   $phpMyAdminVer = get_update_local_config_phpmyadmin();
 */

function get_update_local_config_phpmyadmin(string $aliasPath = 'C:/wamp64/alias/phpmyadmin.conf'): ?string
{
    if (!file_exists($aliasPath)) {
        return null;
    }

    $contents = file_get_contents($aliasPath);
    if ($contents === false) {
        return null;
    }

    if (preg_match('/phpmyadmin(\d+\.\d+\.\d+)/i', $contents, $matches)) {
        return $matches[1];
    }

    return null;
}
