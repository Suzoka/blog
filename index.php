<?php
include './scripts/connect-database.php';
include './scripts/scripts.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 0:
            include './vues/accueil.php';
            break;
        case 1:
            include './vues/billet.php';
            break;
        case 2:
            include './vues/formulaire_login.php';
            break;
        case 3:
            include './vues/formulaire_inscription.php';
            break;
        default:
            include './vues/accueil.php';
            break;
    }
} else {
    include './vues/accueil.php';
}
?>