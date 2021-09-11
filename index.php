<?php
setcookie("session_name", time() + 100000);
session_start();

if (isset($_SESSION['user']))
{
        header("location: phpFiles/profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>shop</title>
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
    <!--Sign in form-->

    <form action="phpFiles/signin.php" method="post">
        <label for="login">Username:</label><br>
        <input type="text" id="login" name="login"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" ><br><br>
        <input type="submit" value="Log in">

    </form>
<p>
    <a href="phpFiles/register.php">Click here to register</a>
</p>

<?php
    unset($_SESSION['message']);
?>


</body>
</html>

