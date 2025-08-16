<?php

/**
 * Fonction is_admin()
 * 
 * Permet de savoir si l'utilisateur connecté est un admin
 * 
 *  Exemple de PHP:
 *  if (is_admin()) {
 *      echo "user is admin";
 *  }
 */

function is_admin()
{
    // Vérifie si un cookie nommé "rmp__admin" est défini
    if (isset($_COOKIE['rmp__admin'])) {
        return true;
    } else {
        return false;
    }
}
