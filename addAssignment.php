<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    session_start();
    $user = $_SESSION['user'];
    $className = htmlspecialchars($_POST['className']);
    $description = htmlspecialchars($_POST['description']);
    $dueDate = htmlspecialchars($_POST['dueDate']);


    $query = "INSERT INTO assignment (username, className, description, dueDate) VALUES (:userName, :class, :description, :dueDate)";
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $user);
    $statement->bindValue(':class', $className);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->execute();
    $statement->closeCursor();

}
