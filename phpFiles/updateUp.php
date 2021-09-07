<?php
session_start();

$connect = mysqli_connect('127.0.0.1', 'root', 'root', 'shop');

$login= $_POST['login'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_POST['id'];

$password = hash('sha256', $password);

$unicity_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");

if (mysqli_num_rows($unicity_user) > 0) {
    $_SESSION['message'] = 'user with login ' . $login . ' exisist';
    header('Location: updateProfile.php');
    return;
}

$unicity_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mysqli_num_rows($unicity_email) > 0) {
    $_SESSION['message'] = 'user with email ' . $email . ' exisist';
    header('Location: updateProfile.php');
    return;
}



//mysqli_query($connect, "UPDATE `users` SET login='$login', Password='$password', fname='$fname', lname='$lname', email='$email', phone='$phone'
//WHERE userid='$id'
//");

$_SESSION['message'] = 'successful update';
//    echo $_SESSION;
header('Location: profile.php');