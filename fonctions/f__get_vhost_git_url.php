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


function get_vhost_git_url($vhost)
{
    $projectPath = $vhost['folder'] ?? null;
    if (!$projectPath || !is_dir($projectPath)) return null;

    // 1. Vérifier si le dossier principal est un repo Git
    $url = extract_git_remote($projectPath);
    if ($url) return $url;

    // 2. Vérifier si c’est un WordPress avec un thème versionné
    $themePath = detect_wordpress_theme_path($projectPath);
    if ($themePath) {
        $url = extract_git_remote($themePath);
        if ($url) return $url;
    }

    return null;
}

function extract_git_remote($path)
{
    $configPath = $path . '/.git/config';
    if (!file_exists($configPath)) return null;

    $content = file_get_contents($configPath);
    if (preg_match('/\[remote "origin"\][^\[]*url\s*=\s*(.+)/', $content, $matches)) {
        $url = trim($matches[1]);
        if (str_starts_with($url, 'git@')) {
            $url = preg_replace('/^git@([^:]+):(.+)\.git$/', 'https://$1/$2', $url);
        } elseif (str_ends_with($url, '.git')) {
            $url = substr($url, 0, -4);
        }
        return $url;
    }
    return null;
}

function detect_wordpress_theme_path($root)
{
    $themeDir = $root . '/wp-content/themes';
    if (!is_dir($themeDir)) return null;

    $themes = array_filter(scandir($themeDir), fn($d) => $d[0] !== '.' && is_dir("$themeDir/$d"));
    foreach ($themes as $theme) {
        if (file_exists("$themeDir/$theme/.git/config")) {
            return "$themeDir/$theme";
        }
    }
    return null;
}
