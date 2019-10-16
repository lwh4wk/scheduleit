<?php

session_start();

unset($_SESSION['user']);

unset($_COOKIE['fname']);
setcookie('fname', '', time()-3600);

session_destroy();

header("Location: home.html");
