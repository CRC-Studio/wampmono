<?php

// Permet d'enregistrer les tools

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $tools = [];

  foreach ($_POST as $key => $value) {
    if (preg_match('/^url-(\d+)$/', $key, $matches)) {
      $i = (int) $matches[1];
      $url = trim($value);
      $title = trim($_POST["title-$i"] ?? '');

      if ($url !== '' && $title !== '') {
        $tools[] = [
          'TITLE' => $title,
          'URL' => $url,
          'ORDER' => count($tools) + 1
        ];
      }
    }
  }

  if (!empty($tools)) {
    $json_path = __DIR__ . '/../content/tools/tools.json';
    $json = json_encode(['TOOLS' => $tools], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    if ($json !== false && is_writable($json_path)) {
      file_put_contents($json_path, $json);
    }
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
}
