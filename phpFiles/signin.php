<?php

require_once 'ConnectDB.php';
require_once 'configConnect.php';

session_start();

    $login = $_POST['login'];
    $password = hash('sha256', $_POST['password']);

    //user authorization and routing to the profile page or start page in case of incorrect login or password
       if ($connect->selectFromDatabase("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'"))
    {

        $user = $connect->findUser($login);

        $_SESSION['user'] = [
            "login" => $user->getLogin(),
            "fname" => $user->getFname(),
            "lname" => $user->getLname(),
            "email" => $user->getEmail(),
            "phone" => $user->getPhone()
        ];

        $_SESSION['userid'] =  $user->getId();
        header('Location: profile.php');

    } else
    {
        $_SESSION['message'] = 'Wrong login or password';
        header('Location: ../index.php');
    }
?>
