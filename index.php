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
        default:
            include './vues/accueil.php';
            break;
    }
} else {
    include './vues/accueil.php';
}
?>