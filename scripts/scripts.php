<?php
function getLastsBillets() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM billets b INNER JOIN utilisateurs u on b.ext_id_auteur = u.id_user ORDER BY date_post desc LIMIT 3;");
    $stmt->execute();
    return $stmt;
}
function getArchives() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM billets b INNER JOIN utilisateurs u on b.ext_id_auteur = u.id_user ORDER BY date_post DESC limit 50 OFFSET 3;");
    $stmt->execute();
    return $stmt;
}
function getBillet($id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM billets WHERE id_billet = :id;");
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function traiteLogin($login, $mdp) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM `utilisateurs` where pseudo=:username");
    $stmt->bindValue(':username', $login, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($mdp, $result['mdp'])) {
            $_SESSION['login'] = $login;
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function disconnection() {
    $_session = array();
    session_destroy();
    header('Location: ./index.php?page=0');
}

function traiteInscription($login, $mdp, $mail) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM `utilisateurs` where pseudo=:username");
    $stmt->bindValue(':username', $login, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count) {
        return false;
    } else {
        $stmt = $db->prepare("INSERT INTO `utilisateurs` (`pseudo`, `mdp`, `admin`, `mail`) VALUES (:username, :password, 0, :mail);");
        $stmt->bindValue(':username', $login, PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($mdp, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['login'] = $login;
        return true;
    }
}

function getCommentaires($id) {
    global $db;
    $stmt = $db->prepare("select * from `commentaires` c inner join `utilisateurs` u on c.ext_id_auteur = u.id_user where ext_id_billet = :id;");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

function getId($login){
    global $db;
    $stmt = $db->prepare("SELECT id_user FROM `utilisateurs` where pseudo=:username");
    $stmt->bindValue(':username', $login, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}

function addCommentaire($id_billet, $id_user, $commentaire){
    global $db;
    $stmt = $db->prepare("INSERT INTO `commentaires` (`ext_id_billet`, `ext_id_auteur`, `contenu_commentaire`, `date_commentaire`) VALUES (:id_billet, :id_auteur, :contenu, NOW());");
    $stmt->bindValue(':id_billet', $id_billet, PDO::PARAM_INT);
    $stmt->bindValue(':id_auteur', $id_user, PDO::PARAM_INT);
    $stmt->bindValue(':contenu', $commentaire, PDO::PARAM_STR);
    $stmt->execute();
    return true;
}
?>