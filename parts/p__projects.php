<?php

// Ce fichier permet de gérer l'affichage
// des projets de l'utilisateur


foreach ($projects as $projectData) {
    include  __DIR__ . '/p__projects-single.php';
};
