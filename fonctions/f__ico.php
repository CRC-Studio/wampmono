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
 *     <?php the_ico('cart') ?>
 * </a>
 */

function get_ico($name)
{
    if (isset($name)) {
        // Formate le chemin de l'icone
        $path = __DIR__ . '/../assets/ico/ico__' . $name . '.svg';

        // Récupère le fichier SVG en tant que chaîne
        $ico = file_exists($path) ? file_get_contents($path) : 'Icône inconnue';

        // Retourne le résultat au template
        return $ico;
    }
}


function the_ico($name)
{
    if (isset($name)) {
        // Récupère le fichier SVG
        $ico = get_ico($name);

        // Retourne le résultat au template
        echo $ico;
    }
}
