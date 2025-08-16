<?php

/**
 * Détection WordPress
 */

function is_wordpress($folder)
{
    return file_exists($folder . '/wp-config.php') ? 'wp-admin/' : false;
}
