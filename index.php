<?php
session_start();
// if(!isset($_SESSION['username'])){
//     header('location: ./client/doge_userlogin.php');
// }

if (isset($_SESSION['dogeuser_id'])) {
    $dogeuser_id = $_SESSION['dogeuser_id'];
} else {
    $dogeuser_id = '';
};

include 'doge_config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Cloudflare -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Link to CSS -->
    <link rel="stylesheet" href="dogestyle.css">
    <title>Doge Dog Store</title>
</head>

<body>
    <!-- Doge Top Navigation -->
    <?php include 'includes/client_dogetopnavigation.php'; ?>

    <!-- Home -->
    <section class="home">
        <div class="home-text">
            <h1>Welcome to <br> <span>Doge Dog Food Store<span><br></h1>
            <h3>Where we feed your dogs with our quality dog food</h3>
            <p>Cause cheems is hungry</p>
        </div>

        <div class="home-img">
            <img src="images/Cheems_Art.gif">
        </div>
    </section>

    <article class="article">Article</article>

    <footer class="footer">Footer</footer>

    <!-- Link to JavaScript -->
    <script src="script.js"></script>
</body>

</html>