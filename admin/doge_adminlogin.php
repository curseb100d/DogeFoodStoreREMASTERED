<?php
// Initialize the session
session_start();

// Check if the user is already logged in that will redirect to home page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ");
    exit;
}
?>

<!-- Sign in that will GET from database -->
<?php
$success = 0;
$deny = 0;

// If server connects properly
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../doge_config.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM dogeadmin WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    // Check if the user exists in the database
    if ($stmt->rowCount() > 0) {
        $success = 1;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: ");
    } else {
        $deny = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to Styles.css -->
    <link rel="stylesheet" href="../dogestyle.css">
    <title>Doge Admin Sign In</title>
</head>

<body>
    <form action="" method="POST">
        <div class="container">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="text" name="password" required>

            <button type="submit">Login</button>

            <?php
            if ($success) {
                echo '
                <div class="alert success">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                    <strong>Yay!</strong> You may now proceed to hell :)
                </div>';
            } ?>

            <!-- If Login not Successful -->
            <?php
            if ($deny) {
                echo '
                <div class="alert danger">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                    <strong>Oops!</strong> Wrong Username or Password
                </div>';
            } ?>
        </div>
    </form>
</body>

</html>