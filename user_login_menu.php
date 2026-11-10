<?php session_start(); session_destroy(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
<meta charset="UTF-8">
<title>User Login Menu</title>
</head>

<body>
    <h1>
        Machine Learning Rock Paper Scissors
    </h1>
    <h2>
        User Login Menu
    </h2> <br>
    <a href="./user_login.php"><button type="button">Account Login</button></a> <br> <br>
    <a href="./user_registration.php"><button type="button">Account Registration</button></a> <br> <br>
    <a href="./game.php?guest=true"><button type="button">Guest Login</button></a>

</body>
</html>