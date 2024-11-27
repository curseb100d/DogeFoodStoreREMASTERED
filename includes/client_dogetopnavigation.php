<!-- Top Navigation -->
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