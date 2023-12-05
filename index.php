<?php
session_start();
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
        case 4:
            if (traiteLogin($_POST['login'], $_POST['MDP'])) {
                $url = './index.php?page=' . $_GET["from"];
                if (isset($_GET["id"])) {
                    $url .= "&id=" . $_GET["id"];
                }
                header('Location: ' . $url);
            } else {
                header('Location: ./index.php?page=2&erreur=true&from=' . $_GET["from"]);
            }
            break;
        case 5:
            if (traiteInscription($_POST['login'], $_POST['MDP'])) {
                $url = './index.php?page=' . $_GET["from"];
                if (isset($_GET["id"])) {
                    $url .= "&id=" . $_GET["id"];
                }
                header('Location: ' . $url);
            } else {
                header('Location: ./index.php?page=3&erreur=true&from=' . $_GET["from"]);
            }
            break;
        case 6:
            disconnection();
            $url = './index.php?page=' . $_GET["from"];
            if (isset($_GET["id"])) {
                $url .= "&id=" . $_GET["id"];
            }
            header('Location: ' . $url);
            break;
        default:
            include './vues/accueil.php';
            break;
    }
} else {
    include './vues/accueil.php';
}
?>