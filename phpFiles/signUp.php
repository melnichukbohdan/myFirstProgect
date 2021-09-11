<?php
session_start();

        require_once 'ConnectDB.php';
    require_once 'User.php';
    require_once 'configConnect.php';


$login= $_POST['login'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = hash('sha256', $password);

    //check whether the login is used by another user
    if ($connect->selectFromDatabase("SELECT * FROM `users` WHERE `login` = '$login'"))
    {
        $_SESSION['message'] = 'user with login ' . $login . ' exisist';
        header('Location: register.php');
        return;
    }

    //check whether the login is email by another user
    if ($connect->selectFromDatabase("SELECT * FROM `users` WHERE `email` = '$email'"))
    {
        $_SESSION['message'] = 'user with email ' . $email . ' exisist';
        header('Location: register.php');
        return;
    }

    //user registration and return to the authorization page
    $connect->insertUser($login, $password, $fname, $lname, $email, $phone);

    $_SESSION['message'] = 'successful registration';
    header('Location: ../index.php');


