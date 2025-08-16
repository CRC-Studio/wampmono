<?php

/***************************************/
/*                                     */
/*              Icones                 */
/*                                     */
/***************************************/

/**
 * Fonction the_ico()
 * 
 * Affiche une icone
 * 
 * Exemple de HTML :
 *   <a href="" class="m-btn m-btn-l m-btn-ico">
 *     <?= get_ico('cart') ?>
 * </a>
 */

function get_ico($name)
{
    if (isset($name)) {
        // Récupère tous les fichiers SVG
        $files = glob(__DIR__ . '/../assets/ico/*.svg');

        // Cherche un fichier dont le nom se termine par "ico__{$name}.svg"
        foreach ($files as $file) {
            if (preg_match('/\/ue[a-f0-9]+-ico__' . preg_quote($name, '/') . '\.svg$/', $file)) {
                return file_get_contents($file);
            }
        }

        // Fallback ancien format
        $path = __DIR__ . '/../assets/ico/ico__' . $name . '.svg';
        if (file_exists($path)) {
            return file_get_contents($path);
        }

        return 'Icône inconnue';
    }
}
