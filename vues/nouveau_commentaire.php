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
<header><?php 
    if (isset($_SESSION['login'])) {
        echo "<p>Bonjour " . $_SESSION['login'] . "</p>";
        echo "<a href='index.php?page=6&from=0'>Se déconnecter</a>";
    }
    else{
        echo "<a href='./index.php?page=2&from=0'>Se connecter</a>";
    }?></header>
</body>
</html>