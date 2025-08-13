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
    $cmsPaths = [
        'cmsWordPress',
        'cmsJoomla',
        'cmsDrupal',
        'cmsPrestaShop',
        'cmsMagento'
    ];

    // Test chaque CMS
    foreach ($cmsPaths as $cmsFunc) {
        $loginPath = $cmsFunc($folder);
        if ($loginPath) {
            $loginUrl = $url . $loginPath;
            break;
        }
    }

    // Si trouvé, on retourne le lien formaté
    if ($loginUrl != '') {
        return '<a href="' . $loginUrl . '" target="_blank" class="m-btn m-btn-p m-btn-ico e-hde">'
            . get_ico('login') .
            '</a>';
    }

    return null;
}


/**
 * Détection WordPress
 */
function cmsWordPress($folder)
{
    return file_exists($folder . '/wp-config.php') ? 'wp-admin/' : false;
}

/**
 * Détection Joomla
 */
function cmsJoomla($folder)
{
    return (file_exists($folder . '/configuration.php') && is_dir($folder . '/administrator'))
        ? 'administrator/'
        : false;
}

/**
 * Détection Drupal
 */
function cmsDrupal($folder)
{
    return (file_exists($folder . '/core/lib/Drupal.php') ||
        (is_dir($folder . '/modules') && file_exists($folder . '/index.php')))
        ? 'user/login'
        : false;
}

/**
 * Détection PrestaShop
 */
function cmsPrestaShop($folder)
{
    return (file_exists($folder . '/app/config/parameters.php') ||
        file_exists($folder . '/config/settings.inc.php'))
        ? 'admin/'
        : false;
}

/**
 * Détection Magento
 */
function cmsMagento($folder)
{
    return (file_exists($folder . '/app/Mage.php') || is_dir($folder . '/app/code'))
        ? 'admin/'
        : false;
}
