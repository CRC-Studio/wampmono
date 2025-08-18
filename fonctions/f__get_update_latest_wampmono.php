<?php

/**
 * Fonction get_update_latest_wampmono()
 * 
 * Permet de récupérer la dernière version de WampMono sur GitHub
  
 * Exemple de PHP :
 *   $latestWampMono = get_update_latest_wampmono();
 */

/**
 * Fonction get_update_latest_wampmono()
 * 
 * Permet de récupérer la dernière version de WampMono sur GitHub
 * 
 * Exemple de PHP :
 *   $latestWampMono = get_update_latest_wampmono();
 */

function get_update_latest_wampmono(): ?array
{
    // Structure de retour attendue
    $latestWampMono = [
        'SUMMARY' => 'unknown',
        'BUILD' => 'unknown',
        'COMMIT' => 'unknown'
    ];

    // Définition du repo et branche cible
    $repo = 'crc-studio/wampmono';
    $branch = 'main';
    $apiUrl = "https://api.github.com/repos/$repo/commits/$branch";

    // Préparation du contexte HTTP
    $context = stream_context_create([
        'http' => [
            'header' => "User-Agent: Wampmono-Update-Checker\r\n"
        ]
    ]);

    // Récupération des données depuis l’API GitHub
    $response = @file_get_contents($apiUrl, false, $context);
    if ($response === false) {
        echo "❌ Erreur lors de la récupération du commit.\n";
        return null;
    }

    // Décodage du JSON
    $data = json_decode($response, true);
    if (!isset($data['sha'], $data['commit']['message'], $data['commit']['committer']['date'])) {
        echo "❌ Données de commit incomplètes.\n";
        return null;
    }

    // Formate le résultat
    $latestWampMono['SUMMARY'] = $data['commit']['message'];
    $latestWampMono['BUILD'] = $data['commit']['committer']['date']; // ISO 8601
    $latestWampMono['COMMIT'] = $data['sha'];

    // Retourne le résultat au template
    return $latestWampMono;
}
