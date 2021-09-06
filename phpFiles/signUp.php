<?php
session_start();

    $connect = mysqli_connect('127.0.0.1', 'root', 'root', 'shop');

    $login= $_POST['login'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $password = hash('sha256', $password);

    $unicity_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");

    if (mysqli_num_rows($unicity_user) > 0) {
        $_SESSION['message'] = 'user with login ' . $login . ' exisist';
        header('Location: register.php');
        return;
    }

    $unicity_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
    if (mysqli_num_rows($unicity_email) > 0) {
        $_SESSION['message'] = 'user with email ' . $email . ' exisist';
        header('Location: register.php');
        return;
    }



mysqli_query($connect, "INSERT INTO `users` (`userid`, `login`, `Password`, `fname`, `lname`, `email`, `phone`) VALUES (NULL, '$login', '$password', '$fname', '$lname', '$email', '$phone')");
    
    $_SESSION['message'] = 'successful registration';
//    echo $_SESSION;
    header('Location: ../index.php');