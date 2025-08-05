<?php

// Permet d'enregistrer les links

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $links = [];

  foreach ($_POST as $key => $value) {
    if (preg_match('/^url-(\d+)$/', $key, $matches)) {
      $i = (int) $matches[1];
      $url = trim($value);
      $title = trim($_POST["title-$i"] ?? '');

      if ($url !== '' && $title !== '') {
        $links[] = [
          'TITLE' => $title,
          'URL' => $url,
          'ORDER' => count($links) + 1
        ];
      }
    }
  }

  if (!empty($links)) {
    $json_path = __DIR__ . '/../content/links.json';
    $json = json_encode(['LINKS' => $links], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    if ($json !== false && is_writable($json_path)) {
      file_put_contents($json_path, $json);
    }
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
}
