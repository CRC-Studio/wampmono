<?php

/**
 * Fonction admin_find_big_img()
 * 
 * Permet de trouver les images
 * qui dépassent une certaine taille ou dimension
 */

// ATTENTION : CETTE ACTION EST DÉFINITIVE
// Décommenter pour lancer la fonction
// admin_update_trad_file();




function admin_update_trad_file()
{
    $supported_locales = get_supported_locales();
    $path = __DIR__ . "/../";
    $strings = admin_get_strings_to_trad($path);
    $strings_map = array_flip($strings);

    foreach ($supported_locales as $locale) {
        $tradFile = __DIR__ . "/../content/lang/{$locale}.json";
        $translations = [];

        // Charge le fichier existant s'il existe
        if (file_exists($tradFile)) {
            $translations = json_decode(file_get_contents($tradFile), true);
        }

        $updated = [];
        $added = [];
        $removed = [];

        // Garde uniquement les chaînes encore utilisées
        foreach ($translations as $key => $value) {
            if (isset($strings_map[$key])) {
                $updated[$key] = $value;
            } else {
                $removed[] = $key;
            }
        }

        // Ajoute les nouvelles chaînes manquantes
        foreach ($strings as $string) {
            if (!isset($updated[$string])) {
                $updated[$string] = "";
                $added[] = $string;
            }
        }

        // Sauvegarde le fichier mis à jour
        file_put_contents($tradFile, json_encode($updated, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Log les changements
        log_trad_changes($locale, $added, $removed);
    }
}


// Cherche les string dans les fichiers php

function admin_get_strings_to_trad($path)
{
    $strings = [];

    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
    foreach ($rii as $file) {
        if (!$file->isDir() && $file->getExtension() === 'php') {
            $code = file_get_contents($file->getPathname());
            preg_match_all("/__\(['\"](.*?)['\"]\)/", $code, $matches);
            foreach ($matches[1] as $match) {
                $strings[$match] = true;
            }
        }
    }

    return array_keys($strings);
}


// Permet de log les changements

function log_trad_changes($locale, $added, $removed)
{
    $logFile = __DIR__ . "/../content/lang/trad-changelog.txt";
    $date = date('Y-m-d H:i:s');
    $log = "[$date] Locale: $locale\n";

    if (!empty($added)) {
        $log .= "  + Ajoutés:\n";
        foreach ($added as $str) {
            $log .= "    - \"$str\"\n";
        }
    }

    if (!empty($removed)) {
        $log .= "  - Supprimés:\n";
        foreach ($removed as $str) {
            $log .= "    - \"$str\"\n";
        }
    }

    $log .= "\n";
    file_put_contents($logFile, $log, FILE_APPEND);
}
