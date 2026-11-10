<?php
session_start();
require_once 'db_login.php';
$key = '4cbdaf72152f4e081707dda2d49b91be';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_error) die ("Fatal Error");

if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username_check_statement = $conn->prepare("SELECT * FROM Account WHERE Username = ?;");
    $username_check_statement->bind_param("s", $username);
    $username_check_statement->execute();
    $username_check_result = $username_check_statement->get_result();

    if($username_check_result->num_rows > 0) {
        $_SESSION['registrationStatus'] = 2;
    } else {
        $account_statement = "INSERT INTO Account (Username, Password, Wins, Losses) VALUES ('$username', AES_ENCRYPT('$password', '$key'), '0', '0')";
        if($conn->query($account_statement)) {
            $_SESSION['registrationStatus'] = 1;
        } else {
            $_SESSION['registrationStatus'] = 3;
        }
    }
    header("Location: user_registration.php");
    $conn->close();
}
?>