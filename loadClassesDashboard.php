<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        require("dbconnect.php");

        session_start();
        $user = $_SESSION['user'];

        $sql = "select * from class where username=\"$user\" ORDER BY className ASC";
        $statement = $db->prepare($sql);
        $statement->execute();

        if ($statement->rowCount() > 0) {
        $assignments = $statement->fetchAll();
        foreach ($assignments as $row) {
            echo $row[1] . "^";
            echo $row[2] . "^";
            echo $row[3] . "^";
            }
        }
    $statement->closeCursor();
}
