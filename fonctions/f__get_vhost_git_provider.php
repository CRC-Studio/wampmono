<?php

/**
 * Fonction get_vhost_git_url()
 * 
 * Permet de récupérer l'URL de Git de chaque Vhost
 * Exemple de PHP :
 *   $vhosts = get_vhosts();
 *   foreach ($vhosts as $vhost) { 
 *     echo get_vhost_git_url($vhost);
 *   }
 */


function get_vhost_git_provider(array $vhost): ?string
{
    $url = get_vhost_git_url($vhost);
    if (!$url) return null;

    if (str_contains($url, 'github.com')) return 'github';
    if (str_contains($url, 'gitlab.com')) return 'gitlab';
    if (str_contains($url, 'bitbucket.org')) return 'bitbucket';

    return 'git';
}
