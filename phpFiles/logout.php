<?php
session_start();

    //logout session and delete cookies
unset($_SESSION['user']);
session_destroy();
setcookie('login', time() -1 );
header('Location: ../index.php');
