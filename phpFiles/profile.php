<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial;
            font-size: 25px;
            background-color: #00ffff;
            text-align: center;
        }
        h1 {
            color: dodgerblue;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Welcome to our shop</h1>
<?php
if  ($_SESSION['message']) {
    echo $_SESSION['message'];
}

?>


    <p> Welcome  <?= $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'] ?></p>
    <p> login:  <?= $_SESSION['user']['login'] ?></p>
    <p> email:  <?= $_SESSION['user']['email'] ?></p>
    <p> phone :  <?= $_SESSION['user']['phone'] ?></p>
    <a href="updateProfile.php">update profile</a><br><br>
    <a href="logout.php">logout</a>



<?php
unset($_SESSION['message']);
?>


</body>
</html>
