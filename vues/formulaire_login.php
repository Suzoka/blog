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
    session_start();
    if (isset($_SESSION['login'])) {
        echo "<p>Bonjour " . $_SESSION['login'] . "</p>";
    }
    ?>
    <br><br><br>
    <form action="./traitelogin.php">
        <label for="login">Votre login</label>
        <input type="text" id="login" name="login">
        <br><br>
        <label for="MDP">Votre MDP</label>
        <input type="text" id="MDP" name="MDP">

        <input type="submit" value="Envoyer">

    </form>

    <?php
    if (isset($_GET['erreur'])) {
        switch ($_GET['erreur']) {
            case 'mdp':
                echo "<p>Erreur : Mot de passe incorrect</p>";
                break;
            case 'login':
                echo "<p>Erreur : Login inconnu</p>";
                break;
        }
    }
    ?>

    <p>Vous n'avez pas de compte ? <a href="./index.php?page=3">En créer un</a></p>

    </body>

</html>