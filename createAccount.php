<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    $user = htmlspecialchars($_POST['user']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);

    $query = "INSERT INTO user (username, password, fname, lname) VALUES (:userName, :pwd, :fname, :lname)";
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $user);
    $statement->bindValue(':pwd', password_hash($pwd, PASSWORD_BCRYPT));
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->execute();
    $statement->closeCursor();

    session_start();
    $_SESSION['user'];

    header("Location: calendar.html");
}
?>
