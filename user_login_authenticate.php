<?php
session_start();
# Connect to mysql database (Requires an already created database with the name in db_login.php)
require_once 'db_login.php'; #db_login.php stores the database hostname, username, password, and db name
$key = '4cbdaf72152f4e081707dda2d49b91be'; #$key is used for encrypting the entered password
$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_error) die ("Fatal Error");

$query = "SELECT * FROM Account";
$result = $conn -> query($query);
if(!$result) die ("Fatal Error");
$rows = $result -> num_rows;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    # Get username and password from the form in user_login.php
    $username = $_POST['username'];
    $password = $_POST['password'];

    # Prepares statement for mysql, retrieves all accounts where username and password match (Assumes two accounts shouldn't share same user and pass)
    $login_statement=$conn->prepare("SELECT * FROM Account WHERE Username = ? AND Password = AES_ENCRYPT(?,?);");
    $login_statement->bind_param("sss", $username, $password, $key);
    $login_statement->execute();
    $statement_result = $login_statement->get_result();

    # If there is a row in the result, then an account matches the entered username and password
    if($statement_result->num_rows > 0) {
        # Store the account's info to the session so other pages can access it
        $result_row = mysqli_fetch_assoc($statement_result);
        $_SESSION['accountID'] = $result_row['AccountID'];
        $_SESSION['username'] = $result_row['Username'];
        $_SESSION['wins'] = $result_row['Wins'];
        $_SESSION['losses'] = $result_row['Losses'];
        #echo "Welcome " . $_SESSION['username'] . "!"; 
        header("Location: game.php"); # Redirect after successful login
    } else {
        $_SESSION['login failed'] = true;
        header("Location: user_login.php"); # Redirect to same page with unsuccessful login, will display message to user
    }
}
?>