<?php


/**
 * Détection Joomla
 */

function is_joomla($folder)
{
    return (file_exists($folder . '/configuration.php') && is_dir($folder . '/administrator'))
        ? 'administrator/'
        : false;
}
