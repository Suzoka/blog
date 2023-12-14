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
        if (checkAdmin($_SESSION['login']) == true) {
            echo "<a href='index.php?page=8'>Admin Panel</a>";
        }
        echo "<a href='index.php?page=6&from=0'>Se déconnecter</a>";
    }
    else{
        echo "<a href='./index.php?page=2&from=0'>Se connecter</a>";
    }?></header>

    <h1>Admin Panel</h1>
    <br>
    <h2>Liste des utilisateurs</h2>
    <?php
    echo"<TABLE align=center border=1 cellpadding=3 cellspacing=0>";
    echo '<tr>';
    foreach ($resultat[0] as $cle => $valeur) {
    echo "<th>$cle</th>";
    }
    echo '<th>Supprimer</th>';
    echo '</tr>';
    foreach ($resultat as $ligne) {
    echo '<tr>';
    foreach ($ligne as $colonne) {
    echo "<td>$colonne</td>";
    }
    echo '<td><a href="./index.php?page=9&id='.$ligne["id_user"].'&action=1" class="erreur">X</a></td>';
    echo '</tr>';
    }
    echo '</table>';
    ?>
    <br><br>
    <h2>Liste des billets</h2>
    <?php
    echo"<TABLE align=center border=1 cellpadding=3 cellspacing=0>";
    echo '<tr>';
    foreach ($billets[0] as $cle => $valeur) {
    echo "<th>$cle</th>";
    }
    echo '<th>Supprimer</th>';
    echo '</tr>';
    foreach ($billets as $ligne) {
    echo '<tr>';
    foreach ($ligne as $colonne) {
    echo "<td>$colonne</td>";
    }
    echo '<td><a href="./index.php?page=9&id='.$ligne["id_billet"].'&action=2" class="erreur">X</a></td>';
    echo '</tr>';
    }
    echo '</table>';
    ?>
</body>
</html>