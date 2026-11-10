<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
<meta charset="UTF-8">
<title>Account Login</title>
</head>

<body>
    <h1>
        Machine Learning Rock Paper Scissors
    </h1>
    <h2>
        Account Login
    </h2> <br>
    <?php
        if(isset($_SESSION['login failed'])) {
            if($_SESSION['login failed'] == true) {
                echo "Incorrect username or password entered. Please try again.";
                $_SESSION['login failed'] = false;
            }
        }
    ?>
    <p> Enter your username and password to login: <br> <br>
        <form action="user_login_authenticate.php" method="post" autocomplete="off">
        <label for="text"> Username: </label> <br>
        <input type="text" name="username" id = "username" required> <br>
        <label for="password"> Password: </label> <br>
        <input type="password" name="password" id = "password" required> <br> <br>
        <button type="submit">Submit</button>
        </form> <br> <br>

        <a href="./user_login_menu.php"><button type="button">Return to Login Menu</button></a>
    </p>

</body>

</html>