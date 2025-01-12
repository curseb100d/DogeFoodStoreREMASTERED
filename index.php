<?php

include 'doge_config.php';

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

    <!-- Box Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Cloudflare -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Link to CSS -->
    <link rel="stylesheet" href="./css/dogestyle.css">
    <title>Doge Dog Store</title>
</head>

<body>

    <!-- Doge Top Navigation -->
    <header class="topnav">
        <nav>
            <img src="./images/dogecoin11transparent.png">

            <ul>
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="./client/doge_menu.php">Menu</a></li>
                <li><a href="../client/doge_orders.php">Orders</a></li>
            </ul>
        </nav>

        <!-- Centered Search -->
        <nav class="search-container">
            <form action="">
                <input type="text" placeholder="Search Doge Dog Food" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </nav>

        <!-- Right Aligned Links -->
        <nav class="topnav-right">
            <a href="../client/doge_userlogin.php">Login</a>
            <button type="submit"><i class="fa fa-shopping-cart"></i></button>

            <?php
            // $select_profile = $pdo->prepare("SELECT * FROM dogeusers WHERE id = ?");
            // $select_profile->execute([$dogeuser_id]);
            // if ($select_profile->rowCount() > 0) {
            //     $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            // }
            ?>
        </nav>
    </header>

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

    <!-- About -->
    <section class="about">
        <div class="about-img">
            <img src="images/pngimg.com - doge_meme_PNG12.png">
        </div>

        <div class="about-text">
            <h1>All About Doge, <span>Wooow!</span></h1>
            <p>This business was inspired from the meme called <span>"Doge"</span> which
                encourage me to open this business to serve for the dogs and owners in our
                area who where in need to feed their dogs</p>
        </div>
    </section>

    <!-- Products -->
    <section class="products" id="products">
        <div class="middle-text">
            <h4>Doge Products</h4>
            <h2>Latest Doge Foods</h2>
        </div>

        <div class="products-content">
            <div class="row">
                <img src="images/pngimg.com - doge_meme_PNG12.png">
                <h3>Pedigree</h3>
                <div class="in-text">
                    <div class="price">
                        <h6>P10</h6>
                    </div>
                    <div class="s-btnn">
                        <a href="#">Order now</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <img src="images/pngimg.com - doge_meme_PNG12.png">
                <h3>Pedigree</h3>
                <div class="in-text">
                    <div class="price">
                        <h6>P10</h6>
                    </div>
                    <div class="s-btnn">
                        <a href="#">Order now</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <img src="images/pngimg.com - doge_meme_PNG12.png">
                <h3>Pedigree</h3>
                <div class="in-text">
                    <div class="price">
                        <h6>P10</h6>
                    </div>
                    <div class="s-btnn">
                        <a href="#">Order now</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <img src="images/pngimg.com - doge_meme_PNG12.png">
                <h3>Pedigree</h3>
                <div class="in-text">
                    <div class="price">
                        <h6>P10</h6>
                    </div>
                    <div class="s-btnn">
                        <a href="#">Order now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-btn">
            <a href="#" class="btn">Explore More</a>
        </div>
    </section>

    <!-- Contact Us -->
    <section class="contact">
        <div class="contact-text">
            <h2>Contact Us</h2>
            <div class="social">
                <a href="#"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="clr"><i class="bx bxl-instagram-alt"></i></a>
            </div>
        </div>

        <footer class="footer">
            <div class="footer-message">Copyright &copy; 2024 - Doge Dog Food Store Information System</div>
        </footer>
    </section>

    <!-- Link to JavaScript -->
    <script src="script.js"></script>

</body>

</html>