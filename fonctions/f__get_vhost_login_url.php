<?php

/**
 * Fonction get_vhost_login_url()
 * 
 * Permet de récupérer l'URL de login du backoffice
 * d'un vhost (WordPress, Joomla, Drupal, PrestaShop, Magento, etc.)
 * Exemple de PHP :
 *   $vhosts = get_vhosts();
 *   foreach ($vhosts as $vhost) { 
 *     echo get_vhost_login_url($vhost);
 *   }
 */


function get_vhost_login_url($vhost)
{
    // Retourne null si le dossier ou l'URL n'est pas défini
    if (empty($vhost['folder']) || empty($vhost['url'])) return null;

    $url = $vhost['url'];
    $folder = $vhost['folder'];
    $loginUrl = '';

    // Liste des fonctions de détection CMS
    $cmsList = [
        'WordPress',
        'Joomla',
        'Drupal',
        'PrestaShop',
        'Magento'
    ];

    // Test chaque CMS
    foreach ($cmsList as $cms) {
        $func = 'is_' . strtolower($cms);
        if (function_exists($func)) {
            $loginPath = $func($folder);
            if ($loginPath) {
                $loginUrl = $url . $loginPath;
                break;
            }
        }
    }


    // Si trouvé, on retourne le lien formaté
    if ($loginUrl != '') {
        return $loginUrl;
    }

    return false;
}
