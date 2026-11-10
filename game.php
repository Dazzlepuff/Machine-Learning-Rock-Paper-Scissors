<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
<meta charset="UTF-8">
<title>Rock Paper Scissors</title>
</head>

<body>
    <h1>
        Machine Learning Rock Paper Scissors
    </h1>
    <h2>
        The Game
    </h2> <br>
</body>

</html>

<?php
    if(isset($_GET['guest']) && $_GET['guest'] === 'true') {
        $_SESSION['username'] = 'Guest';
    }
    echo "<p>Welcome " . $_SESSION['username'] . "!</p>";
?>