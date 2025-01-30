<?php

/**
 * Fonction get_vhost_login_url()
 * 
 * Permet de récupérer l'URL de login du backoffice
 * d'un vhost
 * Exemple de PHP :
 *   $vhosts = get_vhosts();
 *   foreach ($vhosts as $vhost) { 
 *     echo get_vhost_login_url($vhost);
 *   }
 */

function get_vhost_login_url($vhost)
{
    // Retourne null si le dossier n'est pas défini
    if (empty($vhost['folder']) || empty($vhost['url'])) return null;

    // Ajoute quelques variables
    $loginUrl = '';
    $url = $vhost['url'];
    $folder = $vhost['folder'];

    // Chercher la page de connection
    if (isWordPress($folder)) {
        $loginUrl = $url . 'wp-admin/';
    }
    // Formate le résultat
    if ($loginUrl != '') {
        $loginlink = '<a href=' . $loginUrl . ' target="_blank">' . get_ico('logout') . 'a</a>';

        // Retourne le resultat au template
        return $loginlink;
    }


    // Retourne null si ce n'est pas un WordPress
    return null;
}



function isWordPress($folder)
{
    return file_exists($folder . '/wp-config.php');
}
