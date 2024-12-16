<?php

/**
 * Fonction get_home_url()
 * 
 * Permet de récupérer l'URL de la Home
 * Output : https://road.crc-studio.fr/?r=58a4953c3410b7d156196ab7f75bb008
 */

function get_home_url($format = 'full')
{
    // Récupère le nom d'hôte
    $host = $_SERVER['HTTP_HOST'];

    // Vérifie si le site est exécuté en local
    $localhost = array('localhost', '127.0.0.1', '::1');
    $isLocal = in_array($host, $localhost);

    // Récupère le schéma de l'URL (http ou https)
    $protocol = $isLocal ? '' : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");

    // Formate la réponse
    $homeURL = $protocol . '://' . $host;

    // Si le format est 'light', retourne seulement le domaine
    if ($format === 'light') {
        $homeURL = $host;
    }

    // Retourne le résultat
    return $homeURL;
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
