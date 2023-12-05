<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_SESSION['login'])) {
        echo "<p>Bonjour " . $_SESSION['login'] . "</p>";
    }
    ?>
    <br><br><br>
    <form action="./index.php?page=4&from=<?= $_GET["from"] ?>" method="POST">
        <label for="login">Votre login</label>
        <input type="text" id="login" name="login">
        <br><br>
        <label for="MDP">Votre MDP</label>
        <input type="password" id="MDP" name="MDP">

        <input type="submit" value="Envoyer">

    </form>

    <?php
    if (isset($_GET['erreur'])) {
        include './vues/erreur.php';
    }
    ?>

    <p>Vous n'avez pas de compte ? <a href="./index.php?page=3">En créer un</a></p>

</body>

</html>