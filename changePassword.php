<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");

    session_start();
    $username = $_SESSION['user'];
    $currentPassword = $_POST['current'];
    $newPassword = $_POST['new'];

    $sql = "select password from user where username=\"$username\"";
    $statement = $db->prepare($sql);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $row = $statement->fetch();
        if (password_verify($currentPassword, $row[0])) {
            $statement->closeCursor();
            $query = "UPDATE user SET password=:pwd WHERE username=:userName";
            $statement = $db->prepare($query);
            $statement->bindValue(':userName', $username);
            $statement->bindValue(':pwd', password_hash($newPassword, PASSWORD_BCRYPT));
            $statement->execute();
            $statement->closeCursor();
            echo "success";
        } else {
            echo "failed";
        }
    } else {
        echo "no user";
    }
}
