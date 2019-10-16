<?php
require("User.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require("dbconnect.php");
    session_start();
    $user = $_SESSION['user'];
    $sql = "select * from user where username=\"$user\"";
    $statement = $db->prepare($sql);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $row = $statement->fetch();
        $data = new User($row[0], $row[2], $row[3]);
        echo json_encode(get_object_vars($data));
    }
    $statement->closeCursor();
}

