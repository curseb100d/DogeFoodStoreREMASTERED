<!-- Register that will POST to database -->
<?php
$success = 0;
$user = 0;
$invalid = 0;

// if server connects properly
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../doge_config.php';
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check if user already exists
    $sql = "SELECT * FROM dogeuser WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);

    // If user exists, set the flag
    if($stmt->rowCount() > 0){
        $user = 1;
    } else {
        if($password === $confirmpassword){
            // Insert the new user into the database
            $sql = "INSERT INTO dogeuser (firstname, lastname, username, email, mobile, password) VALUES (:firstname, :lastname, :username, :email, :mobile, :password)";
            $stmt = $pdo->prepare($sql);
            
            // Hash the password before storing it for security
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            
            //Hashing the password
            // $stmt->bindParam(':password', $hashedPassword);
            
            $result = $stmt->execute([
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':username' => $username,
                ':email' => $email,
                ':mobile' => $mobile,
                // change the $password to $hashedPassword
                ':password' => $hashedPassword
            ]);
            
            if($result){
                $success = 1;
                // header('location:signin.php');
            }
        } else {
            // die("Error inserting data.");
            $invalid = 1;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to styles.css --> 
    <link rel="stylesheet" href="signup-styles.css">
    <title>Sign Up</title>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill out this form to create an account.</P>

            <label><b>First Name</b></label>
            <input type="text" name="firstname" required>

            <label><b>Last Name</b></label>
            <input type="text" name="lastname" required>

            <label><b>Username</b></label>
            <input type="text" name="username" required>

            <label><b>Email</b></label>
            <input type="text" name="email" required>

            <label><b>Mobile</b></label>
            <input type="text" name="mobile" required>

            <label><b>Password</b></label>
            <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

            <label><b>Confirm Password</b></label>
            <input type="password" name="confirmpassword" required>

            <button type="submit" class="registerbtn" value="Register">Register</button>

            <!-- If the user already exists -->
            <?php 
            if($user) {
                echo '
                <div class="alert danger">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                    <strong>Oops!</strong> Someone already exists.
                </div>';
            } ?>

            <!-- If the user is successfully added -->
            <?php
            if($success) {
                echo '
                <div class="alert success">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                    <strong>Success!</strong> You are now added!
                </div>';
            } ?>

            <!-- If password not match -->
            <?php
            if($invalid) {
                echo '
                <div class="alert warning">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                    <strong>Warning!</strong> Password not match!
                </div>';
            } ?>
        </div>
        
        <!-- Password Validation -->
        <div id="message">
        </div>

        <!-- <script src="script.js"></script> -->

        <div class="container signin">
            <p>Already have an account? <a href="index.php">Sign in</a>.</p>
        </div>
    </form>
</body>
</html>