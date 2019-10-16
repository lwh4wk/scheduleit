<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require("dbconnect.php");

    session_start();
    $user = $_SESSION['user'];

    $sql = "SELECT className FROM class where username=\"$user\"";
    $statement = $db->prepare($sql);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $assignments = $statement->fetchAll();
        foreach ($assignments as $row) {
            echo $row["className"] . ",";
        }
    } else {
        echo "none";
    }
    $statement->closeCursor();
}
