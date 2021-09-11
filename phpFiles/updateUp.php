<?php

require_once 'ConnectDB.php';
require_once 'configConnect.php';

session_start();

$login= $_POST['login'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$id = $_SESSION['userid'];



$password = hash('sha256', $password);

    //check whether the email is being used by another user
if ($connect->selectFromDatabase("SELECT * FROM `users` WHERE `email` = '$email'")) {
    $_SESSION['message'] = 'user with email ' . $email . ' exisist';
    header('Location: updateProfile.php');
    return;
}
    // update user date in the database
try {
    $connect->updateUser($id, $login, $password, $fname, $lname, $email, $phone);
} catch (Exception $e) {
    echo $e;
}

$user = $connect->findUser($login);

$_SESSION['user'] = [
    "login" => $user->getLogin(),
    "fname" => $user->getFname(),
    "lname" => $user->getLname(),
    "email" => $user->getEmail(),
    "phone" => $user->getPhone()
];

$_SESSION['message'] = 'successful update';
//    echo $_SESSION;
header('Location: profile.php');
//print_r($_POST);
//print_r($_SESSION);