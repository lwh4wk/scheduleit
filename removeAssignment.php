<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    session_start();
    $user = $_SESSION['user'];
    $className = htmlspecialchars($_POST['className']);
    $description = htmlspecialchars($_POST['description']);

    echo $className;
    echo $description;

    $query = "DELETE FROM assignment WHERE username=:userName AND className=:class AND description=:descrip";
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $user);
    $statement->bindValue(':class', $className);
    $statement->bindValue(':descrip', $description);
    $statement->execute();
    $statement->closeCursor();

}
