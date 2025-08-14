<?php

/**
 * Fonction get_home_url()
 * 
 * Permet de récupérer l'URL de la Home
 * Output : https://road.crc.studio/?r=58a4953c3410b7d156196ab7f75bb008
 */

function get_home_url($format = 'full')
{
    // Récupère le nom d'hôte
    $host = $_SERVER['HTTP_HOST'];

    // Vérifie si le site est exécuté en local
    $localhost = ['localhost', '127.0.0.1', '::1', 'localhost:8888'];
    $isLocal = in_array($host, $localhost);

    // Récupère le schéma de l'URL (http ou https)
    $protocol = ($isLocal || !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') ? 'http' : 'https';

    // Formate la réponse
    $homeURL = $protocol . '://' . $host;

    // Modifie la réponse si le site est en local
    // sans vhost. Ex. http://localhost/monsite/
    if ($isLocal) {
        $uri = $_SERVER['REQUEST_URI'];
        $segments = explode('/', trim($uri, '/'));

        // Récupère le 1er segment du chemin
        $rootFolder = isset($segments[0]) ? '/' . $segments[0] : '';
        $homeURL .= $rootFolder;
    }

    // Formate la réponse en fonction du format
    if ($format === 'light') {
        $homeURL = str_replace($protocol . '://', '', $homeURL);
    }

    return rtrim($homeURL, '/');
}


/**
 * Fonction the_home_url()
 * 
 * Permet de récupérer l'URL de la Home
 */

function the_home_url($format = 'full')
{
    // Récupère les infos
    $homeURL = get_home_url($format);

    // Retourne le résultat au template
    echo $homeURL;
}
