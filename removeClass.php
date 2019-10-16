<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    session_start();
    $user = $_SESSION['user'];
    $className = htmlspecialchars($_POST['className']);

    $query = "DELETE FROM class WHERE username=:userName AND className=:class";
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $user);
    $statement->bindValue(':class', $className);
    $statement->execute();
    $statement->closeCursor();

    $query = "DELETE FROM assignment WHERE username=:userName AND className=:class";
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $user);
    $statement->bindValue(':class', $className);
    $statement->execute();
    $statement->closeCursor();

}
