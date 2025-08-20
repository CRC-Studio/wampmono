<?php

/**
 * Fonction get_update_latest_wampserver()
 *
 * Scrape les dernières versions des composants WampServer
 * depuis le changelog officiel.
 *
 * @return array
 */
function get_update_latest_wampserver()
{
    // Ajoute quelques variables
    $latestWampServer = [];
    $url = "https://wampserver.aviatechno.net/?changepage=afficher";

    $context = stream_context_create([
        'http' => [
            'header' => "User-Agent: Wampmono-Update-Checker\r\n"
        ]
    ]);

    $html = @file_get_contents($url, false, $context);
    if ($html === false) {
        echo "Erreur lors de la récupération du changelog WampServer.\n";
        return null;
    }

    // Tableau des composants à extraire
    $components = [
        "WampServer" => null,
        "Apache" => null,
        "PHP" => null,
        "Tray Menu Manager" => null,
        "Adminer" => null,
        "PhpMyAdmin" => null
    ];

    // Extraction des versions via regex
    foreach ($components as $name => &$version) {
        // On construit une regex souple pour chaque composant
        $pattern = '/' . preg_quote($name, '/') . '\s*:?[\s\-]*([0-9]+\.[0-9]+(?:\.[0-9]+)?)/i';
        if (preg_match($pattern, $html, $matches)) {
            $version = $matches[1];
        }
    }

    // Formate la réponse
    foreach ($components as $name => $version) {
        // On transforme le nom en majuscules et on retire les espaces
        $key = strtoupper(str_replace(' ', '', $name));
        $latestWampServer[$key] = $version;
    }


    // Retourne le résultat au template
    return $latestWampServer;
}
