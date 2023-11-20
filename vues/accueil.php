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
    <header></header>
    <h1>Blog de Morgan ZARKA</h1>
    <br>
    <h2>Nos derniers articles </h2>
    <?php
    $billets = getLastsBillets()->fetchAll(PDO::FETCH_ASSOC);
    foreach ($billets as $billet) { ?>
        <a href="./index.php?page=1&id=<?= $billet["id_billet"] ?>" class="lienBillet">
            <h3>
                <?= $billet["titre"] ?>
            </h3>
            <p>
                <?= str_replace("<br>", "", $billet["contenu_post"]) ?>
            </p>
        </a>
    <?php } ?>
    <button id="archive">Afficher les archives</button>


    <script src="./script/script.js"></script>
</body>

</html>