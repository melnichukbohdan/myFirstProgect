<?php
session_start();


$connect = mysqli_connect('127.0.0.1', 'root', 'root', 'shop');

$login= $_POST['login'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_SESSION['userid'];



$password = hash('sha256', $password);

//$user = mysqli_query($connect, "SELECT * FROM `users` WHERE 'userid' = '$id'");

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
try {
    mysqli_query($connect, "UPDATE `users` SET login='$login', Password='$password', fname='$fname', lname='$lname', email='$email', phone='$phone'
WHERE userid='$id'
");
} catch (Exception $e) {
    echo $e;
}

$_SESSION['user'] = [
    "login" => $login,
    "password" =>$password,
    "fname" => $fname,
    "lname" => $lname,
    "email" => $email,
    "phone" => $phone
];

$_SESSION['message'] = 'successful update';
//    echo $_SESSION;
header('Location: profile.php');
//print_r($_POST);
//print_r($_SESSION);