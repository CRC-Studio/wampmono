<?php

// Permet de récupérer les VirtualHost de WampServer
//
// Exemple de PHP :
//   $vhosts = get_virtualhosts();
//   foreach ($vhosts as $vhost) { 
//     echo "<a href='{$vhost['url']}' class='m-body'>{$vhost['name']}</a><br>";
//   }

function get_virtualhosts()
{

  // Chemin vers le fichier de configuration des VirtualHost
  $vhostFile = __DIR__ . '/../../../bin/apache/apache2.4.62.1/conf/extra/httpd-vhosts.conf';

  // Vérifie si le fichier existe
  if (!file_exists($vhostFile)) {
    return [];
  }

  // Lit le fichier ligne par ligne
  $lines = file($vhostFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  // Initialisation
  $vhosts = [];
  $currentHost = null;

  foreach ($lines as $line) {
    $line = trim($line);

    // Récupération du ServerName
    if (stripos($line, 'ServerName') === 0) {
      $currentHost = substr($line, strlen('ServerName '));
    }

    // Ajout d'une URL
    if ($currentHost) {
      $vhosts[] = [
        'name' => $currentHost,
        'url' => "http://$currentHost/",
      ];
      $currentHost = null; // Réinitialise pour éviter les doublons
    }
  }

  // Tri alphabétique par le champ 'name'
  usort($vhosts, function ($a, $b) {
    return strcasecmp($a['name'], $b['name']);
  });

  // Grouper par première lettre
  $groupedVhosts = [];
  foreach ($vhosts as $vhost) {
    $firstLetter = strtoupper($vhost['name'][0]); // Première lettre en majuscule
    if (!isset($groupedVhosts[$firstLetter])) {
      $groupedVhosts[$firstLetter] = [];
    }
    $groupedVhosts[$firstLetter][] = $vhost;
  }

  return $groupedVhosts; // Retourne un tableau associatif des VirtualHost
}
