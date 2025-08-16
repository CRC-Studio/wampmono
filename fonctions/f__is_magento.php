<?php

/**
 * Détection Magento
 */

function is_magento($folder)
{
    return (file_exists($folder . '/app/Mage.php') || is_dir($folder . '/app/code'))
        ? 'admin/'
        : false;
}
