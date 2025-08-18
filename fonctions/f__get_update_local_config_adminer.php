<?php

/**
 * Fonction get_update_local_config_adminer()
 * 
 * Permet de récupérer la version de Adminer actuellement
 * installer sur WampServer
 * 
 * Exemple de PHP :
 *   $adminerVer = get_update_local_config_adminer();
 */

function get_update_local_config_adminer(string $aliasPath = 'C:/wamp64/alias/adminer.conf'): ?string
{
    if (!file_exists($aliasPath)) {
        return null;
    }

    $contents = file_get_contents($aliasPath);
    if ($contents === false) {
        return null;
    }

    if (preg_match('/adminer(\d+\.\d+\.\d+)/i', $contents, $matches)) {
        return $matches[1];
    }

    return null;
}
