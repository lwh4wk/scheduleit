<?php
require("dbconnect.php");
session_start();
$user = $_SESSION['user'];
$pwd = htmlspecialchars($_POST['pwd']);

$query = "DELETE FROM user WHERE username=:userName";
$statement = $db->prepare($query);
$statement->bindValue(':userName', $user);
$statement->execute();
$statement->closeCursor();

$query = "DELETE FROM assignment WHERE username=:userName";
$statement = $db->prepare($query);
$statement->bindValue(':userName', $user);
$statement->execute();
$statement->closeCursor();

$query = "DELETE FROM class WHERE username=:userName";
$statement = $db->prepare($query);
$statement->bindValue(':userName', $user);
$statement->execute();
$statement->closeCursor();

header("Location: signout.php");
