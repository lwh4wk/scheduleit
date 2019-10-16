<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("dbconnect.php");
    $user = htmlspecialchars($_POST['user']);
    $pwd = htmlspecialchars($_POST['pwd']);

    $sql = "select password from user where username=\"$user\"";
    $statement = $db->prepare($sql);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $row = $statement->fetch();
        if (password_verify($pwd, $row[0])) {
            //echo "Testing";
            $statement->closeCursor();

            session_start();

            $_SESSION['user'] = $user;

            $_SESSION['time'] = $_SERVER['REQUEST_TIME'];

            $sql = "select fname from user where username=\"$user\"";
            $statement = $db->prepare($sql);
            $statement->execute();
            $row = $statement->fetch();

            setcookie('fname', $row["fname"], time() + 3600);

            echo "true";

        } else {
            echo "<div style=\"padding-top: 3%;\"><p class='alert alert-danger'>Username and password do not match our record.</p></div> <br/>";
            $statement->closeCursor();
        }
    } else {
        echo "<div style=\"padding-top: 3%;\"><p class='alert alert-danger'>Username and password do not match our record.</p></div> <br/>";
        $statement->closeCursor();
    }
}


?>
