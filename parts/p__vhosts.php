<?php

// Ce fichier permet de gérer l'affichage
// des vhosts de l'utilisateur


foreach ($vhostsGrouped as $letter => $vhosts) {
    include  __DIR__ . '/p__vhosts-single.php';
};
