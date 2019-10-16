<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require("dbconnect.php");
    session_start();
    $user = $_SESSION['user'];
    $sql = "select * from class where username=\"$user\"";
    $statement = $db->prepare($sql);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $classes = $statement->fetchAll();
        foreach ($classes as $row) {
            echo $row[1] . "^";
            echo $row[2] . "^";
            echo $row[3] . "^";
        }
    }
    $statement->closeCursor();
}
