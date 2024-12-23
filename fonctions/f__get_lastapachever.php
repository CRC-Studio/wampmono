<?php

// Permet de récupérer la derrnière version d'Apache
// installée sur de WampServer
//
// Exemple de PHP :
//   $apache_version = get_last_apache_version();
//   $vhostFile = __DIR__ . '/../../../bin/apache/' . $apache_version . '/conf/extra/httpd-vhosts.conf';


function get_last_apache_version()
{
  $apacheDir = __DIR__ . '/../../../bin/apache/';
  $versions = [];

  // Vérifie si le dossier existe
  if (is_dir($apacheDir)) {
    $directories = scandir($apacheDir);
    foreach ($directories as $dir) {
      // Filtre les dossiers dont le nom correspond à une version (par exemple, apache2.4.62.1)
      if (preg_match('/^apache([0-9\\.]+)$/', $dir, $matches)) {
        $versions[] = $matches[1];
      }
    }

    // Trie les versions pour récupérer la plus récente
    if (!empty($versions)) {
      usort($versions, 'version_compare');
      // Retourne la version la plus récente
      return 'apache' . end($versions);
    }
  }

  // Retourne null si aucun dossier Apache trouvé
  return null;
}
