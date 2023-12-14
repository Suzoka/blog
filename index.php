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
            $billet = getBillet($_GET["id"]);
            $commentaires = getCommentaires($_GET["id"]);
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
            if (traiteInscription($_POST['login'], $_POST['MDP'], $_POST['mail'])) {
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
        case 7:
            if (isset($_SESSION['login']) && isset($_POST['commentaire']) && isset($_POST['id_billet'])) {
                $id = getId($_SESSION['login'])->fetch(PDO::FETCH_ASSOC);
                if (addCommentaire($_POST['id_billet'], $id, $_POST['commentaire']) == true) {
                    echo "<p>Commentaire bien ajouté ajouté. Vous allez être redirigés</p>";
                    echo "<script>setTimeout(function(){window.location.href = './index.php?page=1&id=" . $_POST['id_billet'] . "';}, 2000);</script>";
                } else {
                    echo "<p>Erreur lors de l'ajout du commentaire. Vous allez être redirigés</p>";
                    echo "<script>setTimeout(function(){window.location.href = './index.php?page=1&id=" . $_POST['id_billet'] . "';}, 3000);</script>";
                }
            } else {
                header('Location: ./index.php?page=2&from=1&id=' . $_POST["id_billet"]);
            }
            break;
        default:
            include './vues/accueil.php';
            break;
    }
} else {
    include './vues/accueil.php';
}
?>