<?php
session_start();
unset($_SESSION['user']);
session_destroy();
setcookie('login', time() -1 );
header('Location: ../index.php');

//include_once "../index.php";