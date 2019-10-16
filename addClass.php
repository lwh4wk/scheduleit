<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    session_start();
    $user = $_SESSION['user'];
    $className = htmlspecialchars($_POST['className']);
    $days = htmlspecialchars($_POST['days']);
    $time = htmlspecialchars($_POST['time']);


    $query = "INSERT INTO class (username, className, days, time) VALUES (:userName, :className, :days, :times)";
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $user);
    $statement->bindValue(':className', $className);
    $statement->bindValue(':days', $days);
    $statement->bindValue(':times', $time);
    $statement->execute();
    $statement->closeCursor();

}
