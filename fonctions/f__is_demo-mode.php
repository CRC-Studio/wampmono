<?php

/**
 * Fonction is_demo_mode()
 * 
 * Permet d'activer ou désactiver le mode demo
 */

function is_demo_mode(): bool
{
    $path = __DIR__ . '/../demo.txt';
    return file_exists($path);
}
define('WAMPMONO_DEMO_MODE', is_demo_mode());
