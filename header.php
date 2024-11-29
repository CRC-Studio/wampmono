<?php

// Ce fichier est le premier a être exécuté lors de la construction
// des pages. C'est ici que tout commence...

// Ajoute le fichier de fonctions
include  __DIR__ . '/fonctions.php';

// Ajoute les info Meta

$meta_title = "WampMono";
$meta_desc  = "WampMono - Un thème conçu pour personnaliser la page d'accueil de WampServer, développé avec Monobloc par CRC Studio.";
$meta_key   = "WampServer, thème personnalisé, Monobloc, CRC Studio, développement web";
$meta_name  = "wampmono.lcl";
$meta_url   = "http://wampmono.lcl/";
$meta_img   = $meta_url . "assets/img/cover__rs.png";



?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <?php // Meta 
    ?>
    <title><?= $meta_title ?></title>
    <meta name="description" content="<?= $meta_desc ?>">
    <meta name="keywords" content="<?= $meta_key ?>">
    <meta name="contact" content="hello@crc.studio">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php // Meta pour les robots
    ?>
    <meta name="robots" content="index, follow, all">
    <meta name="googlebot" content="index, follow, all">
    <meta name="googlebot-image" content="index, follow, all">

    <?php
    // Ou désactivé les robots
    // <meta name="robots" content="noindex, nofollow"> 
    ?>

    <?php // Favicon 
    ?>
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="./assets/favicon/safari-pinned-tab.svg" color="#5bbad5">

    <?php // Themes colors 
    ?>
    <meta name="msapplication-TileColor" content="#ffd400">
    <meta name="theme-color" content="#ffd400">

    <?php // Facebook Meta Tags
    ?>
    <link rel="canonical" href="<?= $meta_url ?>">
    <meta property="og:url" content="<?= $meta_url ?>">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $meta_title ?>">
    <meta property="og:site_name" content="<?= $meta_name ?>">
    <meta property="og:description" content="<?= $meta_desc ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image" content="<?= $meta_img ?>">

    <?php // Twitter Meta Tags
    ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="<?= $meta_name ?>">
    <meta property="twitter:url" content="<?= $meta_url ?>">
    <meta name="twitter:title" content="<?= $meta_title ?>">
    <meta name="twitter:description" content="<?= $meta_desc ?>">
    <meta name="twitter:image" content="<?= $meta_img ?>">

    <?php // Webfont 
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <?php // Style.css et script.js 
    ?>
    <link href='./style.min.css' media='all' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="./assets/js/monopage.js"></script>
</head>

<body>