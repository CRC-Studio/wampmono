<?php

// Permet de récupérer les VirtualHost de WampServer
//
// Exemple de PHP :
//   $vhosts = get_vhosts();
//   foreach ($vhosts as $vhost) { 
//     echo "<a href='{$vhost['url']}' class='m-body'>{$vhost['name']}</a><br>";
//   }

function get_vhosts()
{

  // Chemin vers le fichier de configuration des VirtualHost
  $apache_version = get_last_apache_version();
  $vhostFile = __DIR__ . '/../../../bin/apache/' . $apache_version . '/conf/extra/httpd-vhosts.conf';

  // Vérifie si le fichier existe
  if (!file_exists($vhostFile)) {
    return [];
  }

  // Lit le fichier ligne par ligne
  $lines = file($vhostFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  // Initialisation
  $vhosts = [];
  $currentHost = null;
  $documentRoot = null;

  foreach ($lines as $line) {
    $line = trim($line);

    // Récupération du ServerName
    if (stripos($line, 'ServerName') === 0) {
      $currentHost = substr($line, strlen('ServerName '));
    }

    // Récupération du DocumentRoot
    if (stripos($line, 'DocumentRoot') === 0) {
      $documentRoot = trim(substr($line, strlen('DocumentRoot')));
      // Suppression des guillemets éventuels
      $documentRoot = trim($documentRoot, '"');
    }

    // Ajout d'une URL
    if ($currentHost) {
      $vhosts[] = [
        'name'   => $currentHost,
        'folder' => $documentRoot,
        'url'    => "http://$currentHost/",
      ];
      // Réinitialise pour éviter les doublons
      $currentHost = null;
      $documentRoot = null;
    }
  }

  // Tri alphabétique par le champ 'name'
  usort($vhosts, function ($a, $b) {
    return strcasecmp($a['name'], $b['name']);
  });

  // Grouper par première lettre
  $groupedVhosts = [];
  foreach ($vhosts as $vhost) {
    // Première lettre en majuscule
    $firstLetter = strtoupper($vhost['name'][0]);
    if (!isset($groupedVhosts[$firstLetter])) {
      $groupedVhosts[$firstLetter] = [];
    }
    $groupedVhosts[$firstLetter][] = $vhost;
  }

  // Retourne un tableau associatif des VirtualHost
  return $groupedVhosts;
}
