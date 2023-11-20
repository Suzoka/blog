<?php
include './connect-database.php';
include './scripts.php';

echo json_encode(getArchives()->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
?>