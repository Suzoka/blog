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

?>