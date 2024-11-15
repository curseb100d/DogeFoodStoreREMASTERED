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

    <!-- Slideshow -->
    <!-- <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="images/doge.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/cheems.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <div style="text-align: center;">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div> -->

    <!-- Cut Out Text -->
    <!-- <div class="image-container">
        <div class="text">WELCOME TO</div>
        <div class="text">DOGE DOG FOOD STORE</div>
    </div> -->

    <header id="pageHeader">Header</header>
    <article id="mainArticle">Article</article>
    <nav id="mainNav">Nav</nav>
    <div id="siteAds">Ads</div>
    <footer id="pageFooter">Footer</footer>

    <!-- Link to JavaScript -->
    <script src="script.js"></script>
</body>

</html>