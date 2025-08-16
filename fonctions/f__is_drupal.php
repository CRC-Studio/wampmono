<?php

/**
 * Détection Drupal
 */

function is_drupal($folder)
{
    return (file_exists($folder . '/core/lib/Drupal.php') ||
        (is_dir($folder . '/modules') && file_exists($folder . '/index.php')))
        ? 'user/login'
        : false;
}
