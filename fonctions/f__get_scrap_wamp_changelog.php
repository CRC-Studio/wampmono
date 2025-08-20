<?php

// Permet d'enregistrer les tools

function get_scrap_wamp_changelog()
{
    $url = "https://wampserver.aviatechno.net/?changepage=afficher";
    $html = file_get_contents($url);

    // Extraire les lignes du changelog
    preg_match_all('/\d{4}-\d{2}-\d{2} : .*/', $html, $matches);
    $lines = $matches[0];

    $components = [
        "Tray Menu Manager" => null,
        "PHP" => null,
        "xDebug" => null,
        "Adminer" => null,
        "Update WampServer" => null,
        "Apache" => null,
        "PhpMyAdmin" => null
    ];

    foreach ($lines as $line) {
        foreach ($components as $key => $value) {
            if ($value === null && stripos($line, $key) !== false) {
                // Extraire la version
                preg_match('/' . preg_quote($key, '/') . '\s+([^\s]+)/i', $line, $versionMatch);
                if (isset($versionMatch[1])) {
                    $components[$key] = $versionMatch[1];
                } else {
                    // Cas où plusieurs versions sont listées
                    preg_match('/' . preg_quote($key, '/') . '\s+([0-9\.,\s]+)/i', $line, $multiMatch);
                    if (isset($multiMatch[1])) {
                        $components[$key] = trim($multiMatch[1]);
                    }
                }
            }
        }
    }

    return $components;
}
