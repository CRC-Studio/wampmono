<?php

/**
 * Détection PrestaShop
 */

function is_prestashop($folder)
{
    return (file_exists($folder . '/app/config/parameters.php') ||
        file_exists($folder . '/config/settings.inc.php'))
        ? 'admin/'
        : false;
}
