<?php
include './connect-database.php';
include './scripts.php';

header("Access-Control-Allow-Origin: *");
header('content-type:application/json');
echo json_encode(getArchives()->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
?>