<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil du blog</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header><?php 
    if (isset($_SESSION['login'])) {
        echo "<p>Bonjour " . $_SESSION['login'] . "</p>";
        echo "<a href='index.php?page=6&from=0'>Se déconnecter</a>";
    }
    else{
        echo "<a href='./index.php?page=2&from=0'>Se connecter</a>";
    }?></header>
    <h1>Blog de Morgan ZARKA</h1>
    <br>
    <h2>Nos derniers articles </h2>
    <?php
    $billets = getLastsBillets()->fetchAll(PDO::FETCH_ASSOC);
    foreach ($billets as $billet) { ?>
        <a href="./index.php?page=1&id=<?= $billet["id_billet"] ?>" class="lienBillet">
            <div class="titreFlex">
                <h3>
                    <?= $billet["titre"] ?>
                </h3>
                <p>
                    <?= $billet["date_post"] ?>
                </p>
            </div>
            <p>
                <?= str_replace("<br>", "", $billet["contenu_post"]) ?>
            </p>
            <p class="signature">Par <?= $billet["pseudo"]?></p>
        </a>
    <?php } ?>
    <button id="archive">Afficher les archives</button>
    <div class="archives"></div>


    <script src="./scripts/script.js"></script>
</body>

</html>