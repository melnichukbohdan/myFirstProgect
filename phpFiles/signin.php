<?php
session_start();
    $connect = mysqli_connect('127.0.0.1', 'root', 'root', 'shop');

    $login = $_POST['login'];
    $password = hash('sha256', $_POST['password']);
        // select user and pass this user
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");


       if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user); // converting the query result to a database into an array

        $_SESSION['user'] = [
            "login" => $user['login'],
            "fname" => $user['fname'],
            "lname" => $user['lname'],
            "email" => $user['email'],
            "phone" => $user['phone']
        ];

        $_SESSION['userid'] =  $user['userid'];
        header('Location: profile.php');

    } else {
        $_SESSION['message'] = 'Wrong login or password';
        header('Location: ../index.php');
    }
?>
