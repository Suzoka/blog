<?php 

if (isset($_GET["id"])) {
    $billet = getBillet($_GET["id"]);
    if ($billet->rowCount() == 0) {
        header("Location: ./index.php");
    }
    else {
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
    <h1><?= $billet["titre"] ?></h1>
    <p><?= $billet["contenu_post"] ?></p>
</body>
</html>

<?php } else { 
    header("Location: ./index.php");
}?>