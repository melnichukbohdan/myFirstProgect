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
    <!--Sign in form-->

    <form action="phpFiles/signin.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
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

