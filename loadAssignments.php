<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    require("dbconnect.php");

    session_start();
    $user = $_SESSION['user'];


    echo loadAssignments($user, $db);
}

function loadAssignments($username, $db) {
    $sql = "select * from assignment where username=\"$username\"";
    $statement = $db->prepare($sql);
    $statement->execute();

    $result = "";
    if ($statement->rowCount() > 0) {
        $assignments = $statement->fetchAll();
        foreach ($assignments as $row) {
            $result .= $row[1] . ",";
            $result .= $row[2] . ",";
            $result .= $row[3] . ",";
        }
    }
    $statement->closeCursor();
    return $result;
}
