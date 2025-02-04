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

  if (!file_exists($vhostFile)) {
    return [];
  }

  // Lire tout le contenu du fichier
  $config = file_get_contents($vhostFile);

  // Expression régulière pour capturer chaque VirtualHost
  preg_match_all('/<VirtualHost[^>]*>(.*?)<\/VirtualHost>/is', $config, $matches, PREG_SET_ORDER);

  $vhosts = [];

  foreach ($matches as $match) {
    $block = $match[1];

    // Récupération du ServerName
    if (preg_match('/ServerName\s+(.+)/i', $block, $serverNameMatch)) {
      $serverName = trim($serverNameMatch[1]);
    } else {
      continue; // Si pas de ServerName, on ignore ce bloc
    }

    // Récupération du DocumentRoot
    if (preg_match('/DocumentRoot\s+"?([^"\r\n]+)"?/i', $block, $docRootMatch)) {
      $documentRoot = trim($docRootMatch[1]);
    } else {
      $documentRoot = null;
    }

    // Ajouter l'entrée au tableau des vhosts
    $vhosts[] = [
      'name'   => $serverName,
      'folder' => $documentRoot,
      'url'    => "http://$serverName/",
    ];
  }

  // Tri alphabétique par le champ 'name'
  usort($vhosts, fn($a, $b) => strcasecmp($a['name'], $b['name']));

  // Grouper par première lettre
  $groupedVhosts = [];
  foreach ($vhosts as $vhost) {
    $firstLetter = strtoupper($vhost['name'][0]);
    $groupedVhosts[$firstLetter][] = $vhost;
  }

  return $groupedVhosts;
}
