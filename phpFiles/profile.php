<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: ../index.php");
}
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
if  ($_SESSION['message'])
    {
    echo $_SESSION['message'];
    }

?>

    <!-- user page -->
    <p> Welcome  <?= $_SESSION['user']['fname'] . ' ' . $_SESSION['user']['lname'] ?></p>
    <p> login:  <?= $_SESSION['user']['login'] ?></p>
    <p> email:  <?= $_SESSION['user']['email'] ?></p>
    <p> phone :  <?= $_SESSION['user']['phone'] ?></p>

    <!-- button redirection to the data update page -->
    <a href="updateProfile.php">update profile</a><br><br>

    <!-- exit button-->
    <a href="logout.php">logout</a>



<?php
unset($_SESSION['message']);
?>


</body>
</html>
