<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");

    session_start();
    $user = $_SESSION['user'];
    $className = $_POST['className'];

    $sql = "select * from assignment where username=\"$user\" AND className=\"$className\"";
    $statement = $db->prepare($sql);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $assignments = $statement->fetchAll();
        foreach ($assignments as $row) {
            echo $row[1] . ",";
            echo $row[2] . ",";
            echo $row[3] . ",";
        }
    } else {
        echo "none";
    }
    $statement->closeCursor();
}
