<?php

/**
 * Fonction is_update_check_recent()
 * 
 * Permet de vérifier si WampMono doit refaire
 * un check update
 * 
 * Exemple de PHP :
 *  $data = get_update_json();
 *  $lastCheck = $data['LASTCHECK'];
 *   if (is_update_check_recent($lastCheck)) {
 *     
 *   }
 */


function is_update_check_recent($lastCheck)
{
    // Vérifie que $lastCheck est bien un entier positif
    if (!is_numeric($lastCheck) || $lastCheck <= 0) {
        return false;
    }

    $now = time();
    $oneWeek = 7 * 24 * 60 * 60;

    return ($now - $lastCheck) < $oneWeek;
}
