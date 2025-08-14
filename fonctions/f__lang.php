<?php

/**
 * Fonction lang()
 * 
 * Permet de gérer le multilangue de Monolythe
 * 
 *  Exemple de PHP:
 *  <span><?= __('Hello World') ?></span>
 */


/**
 * Liste des langues supportées
 */


function get_supported_locales()
{
    return ['fr', 'en', 'ja'];
}


/**
 * Détecte la langue préférée de l'utilisateur
 */
function detect_locale()
{
    $accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en';
    $lang = substr($accept, 0, 2);
    return in_array($lang, get_supported_locales()) ? $lang : 'en';
}

/**
 * Initialise la langue de Monolythe
 */
function set_locale($lang = null)
{
    global $locale, $translations;

    $locale = $lang ?? detect_locale();
    $file = __DIR__ . "/../content/lang/{$locale}.json";

    $translations = file_exists($file)
        ? json_decode(file_get_contents($file), true)
        : [];
}

/**
 * Retourne la langue active
 */
function get_locale()
{
    global $locale;
    return $locale ?? detect_locale();
}

/**
 * Traduit une chaîne
 */
function __($string)
{
    global $translations;

    if (!isset($translations[$string]) || trim($translations[$string]) === '') {
        return $string;
    }

    return $translations[$string];
}


// Initialisation
set_locale();
