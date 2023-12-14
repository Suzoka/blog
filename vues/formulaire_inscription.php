<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <br><br><br>
    <form action="./index.php?page=5&from=<?php echo($_GET["from"]); if(isset($_GET["id"])){echo("&id=".$_GET["id"]);}?>" method="POST">
    <label for="mail">Votre adresse mail</label><input type="email" name="mail" id="mail">
        <label for="login">Votre login</label>
        <input type="text" id="login" name="login">
        <br><br>
        <label for="MDP">Votre MDP</label>
        <input type="text" id="MDP" name="MDP">

        <input type="submit" value="Envoyer">

    </form>

    <?php
    if (isset($_GET['erreur'])) {
        echo "<p class=\"erreur\">Ce nom d'utilisateur est déjà utilisé</p>";
    }
    ?>

    <p>Vous avez déjà un compte ? <a href="./index.php?page=2&from=<?php echo($_GET["from"]); if(isset($_GET["id"])){echo("&id=".$_GET["id"]);} ?>">Me connecter</a></p>

</body>

</html>