<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
<meta charset="UTF-8">
<title>Account Registration</title>
</head>

<body>
    <h1>
        Machine Learning Rock Paper Scissors
    </h1>
    <h2>
        Account Registration
    </h2> <br>
    <?php
        if(isset($_SESSION['registrationStatus'])) {
            if($_SESSION['registrationStatus'] == 2) {
                echo "Username already taken. Please enter a different username.";
            } else if($_SESSION['registrationStatus'] == 3) {
                echo "Error registering account. Please try again.";
            } else if($_SESSION['registrationStatus'] == 1){
                echo "Account successfully registered!";
            }
            $_SESSION['registrationStatus'] = 0;
        }
    ?>
<p> Enter a username and password to register an account: <br> <br>
<form action="user_registration_get.php" method="post" autocomplete="off">
    <label for="username">Username:</label> <br>
    <input name="username" id="username" type="text" required> <br>

    <label for="password">Password:</label> <br>
    <input name="password" id="password" type="password" required> <br> <br>

    <button type="submit">Submit</button> <br> <br>
</form>
    <a href="./user_login_menu.php"><button type="button">Return to Login Menu</button></a>
</p>
</body>

</html>
