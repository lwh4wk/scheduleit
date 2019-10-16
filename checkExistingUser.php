<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    $user = htmlspecialchars($_POST['username']);

    $query = "SELECT * FROM user WHERE username=:userName";
    $statement = $db->prepare($query);
    $statement->bindValue(":userName", $user);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        echo "false";
        $statement->closeCursor();
    } else {
        echo "true";
        $statement->closeCursor();
    }
}
