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
            font-Color: Pink;
            font-size: 20px;
            background-color: #00ffff;
            text-align: center;
        }
        h2 {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
if  ($_SESSION['message'])
{
echo $_SESSION['message'];
}
?>

<h2>Please fill in the registration form</h2>
<!--user registration form-->
<form action="signUp.php" method="post">
    <label for="login">Username:</label><br>
    <input type="text" id="login" name="login" minlength="6" maxlength="10" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" minlength="6" maxlength="16"required><br><br>
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" placeholder="Donald*" required><br><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" placeholder="Trump*" required><br><br>
    <label for="email">Email</label><br>
    <input type="text" id="email" name="email" placeholder="email@email" required><br><br>
    <label for="phone">Enter your phone number:</label><br>
    <input type="tel" id="phone" name="phone" placeholder="+3.........." minlength="13" maxlength="13"required><br>

    <input type="checkbox" id="rules" name="rules" required>
    <label for="rules"><a href="" target="_blank" >I agree to the terms</a></label><br><br>

    <input type="submit" value="Register"><br>
    <p>
        Do you have an account? <a href="../index.php">Sign In</a>
    </p>

</form>

</body>
</html>