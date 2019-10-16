<?php
session_start();

try {
    if (isset($_SESSION['user'])) {
        if (($_SERVER['REQUEST_TIME'] - $_SESSION['time']) > 1800) {
            header("Location: signout.php");
        } else {
            $_SESSION['time'] = $_SERVER['REQUEST_TIME'];
            setcookie('user', $_SESSION['user'], time()+1800);
            echo $_SESSION['user'];
        }
    } else {
        echo "false";
    }
} catch (Exception $e) {
    echo "false";
}


