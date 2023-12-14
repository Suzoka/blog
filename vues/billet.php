<?php

if (isset($_GET["id"])) {
    if ($billet->rowCount() == 0) {
        // header("Location: ./index.php");
    } else {
        $billet = $billet->fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./style.css">
    </head>

    <body>
        <header>
            <?php
            if (isset($_SESSION['login'])) {
                echo "<p>Bonjour " . $_SESSION['login'] . "</p>";
                if (checkAdmin($_SESSION['login']) == true) {
                    echo "<a href='index.php?page=8'>Admin Panel</a>";
                }
                echo "<a href='index.php?page=6&from=0'>Se déconnecter</a>";
            } else {
                echo "<a href='./index.php?page=2&from=1&id=" . $billet["id_billet"] . "'>Se connecter</a>";
            } ?>
        </header>
        <br><br>
        <a href="./index.php">Retour à l'accueil</a>
        <h1>
            <?= $billet["titre"] ?>
        </h1>
        <p>
            <?= $billet["contenu_post"] ?>
        </p>
        <br><br>
        <h2>Commentaires</h2>
        <?php
        if ($commentaires->rowCount() == 0) {
            echo "<i>Il n'y a aucun commentaire pour le moment.</i>";
        } else {
            foreach ($commentaires as $key => $value) { ?>
                <div class='commentaire'>
                    <p class="date">
                        <?php echo (date('d/m - H:i', strtotime($value["date_commentaire"]))) ?>
                    </p>
                    <p class='contenu'>
                        <?php echo $value["contenu_commentaire"] ?>
                    </p>
                    <p class='signature'>
                        <?php echo $value["pseudo"] ?>
                    </p>
                </div>
            <?php }
        }
        echo "<br>";
        if (isset($_SESSION['login'])) { ?>
            <h3>Ajouter un commentaire</h3>
            <form action="./index.php?page=7" method="post">
                <input type="hidden" name="id_billet" value="<?= $billet["id_billet"] ?>">
                <textarea name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
                <input type="submit" value="Poster">
            </form>
        <?php } else {
            echo "<p>Vous devez être connecté pour poster un commentaire.</p>";
        }
        ?>


    </body>

    </html>

<?php } else {
    header("Location: ./index.php");
} ?>