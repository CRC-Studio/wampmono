<?php

/**
 * Fonction is_wampmono_update()
 * 
 * Vérifie si une nouvelle version de WampMono
 * a été poussée sur la branche main du repo GitHub.
 * Stocke les infos dans content/update/update.json
 * 
 * Exemple de PHP :
 *   if (is_wampmono_update()) {
 *     Nouvelle version détectée !";
 *   } else {
 *   Rien de nouveau sur WampMono.";
 *   }
 */



function is_wampmono_update(): bool
{
    $repo = 'crc-studio/wampmono';
    $branch = 'main';
    $apiUrl = "https://api.github.com/repos/$repo/commits/$branch";
    $updateDir = __DIR__ . '/../content/update';
    $jsonFile = $updateDir . '/update.json';

    // 🔧 Créer le dossier s'il n'existe pas
    if (!is_dir($updateDir)) {
        if (!mkdir($updateDir, 0775, true)) {
            return false;
        }
    }

    $jsonData = [];
    if (file_exists($jsonFile)) {
        $jsonData = json_decode(file_get_contents($jsonFile), true);
        $lastCheck = $jsonData['LASTCHECK'] ?? 0;

        // ⏳ Vérifier si la dernière vérification date de moins de 7 jours
        if (time() - $lastCheck < 7 * 24 * 60 * 60) {
            return false;
        }
    }

    // 🛰️ Requête GitHub
    $context = stream_context_create([
        'http' => [
            'header' => "User-Agent: Wampmono-Update-Checker\r\n"
        ]
    ]);

    $response = @file_get_contents($apiUrl, false, $context);
    if ($response === false) {
        return false;
    }

    $data = json_decode($response, true);
    $latestCommit = $data['sha'] ?? null;
    if (!$latestCommit) {
        return false;
    }

    $previousCommit = $jsonData['LASTCOMMIT'] ?? null;
    $jsonData['LASTCHECK'] = time();

    if ($latestCommit !== $previousCommit) {
        $jsonData['LASTCOMMIT'] = $latestCommit;
        file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        return true;
    }

    // 🕊️ Pas de mise à jour, mais on enregistre le check
    file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    return false;
}
