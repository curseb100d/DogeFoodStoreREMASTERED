    <!-- Top Navigation -->
    <div class="topnav">

        <div>
            <img src="./images/dogecoin11transparent.png">
            <a href="#home" class="active">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="./client/doge_menu.php">Menu</a>
            <a href="../client/doge_orders.php">Orders</a>
        </div>

        <!-- Centered Search -->
        <div class="search-container">
            <form action="">
                <input type="text" placeholder="Search Doge Dog Food" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <!-- Right Aligned Links -->
        <div class="topnav-right">
            <a href="../client/doge_userlogin.php">Login</a>
            <button type="submit"><i class="fa fa-shopping-cart"></i></button>

            <?php
            $select_profile = $pdo->prepare("SELECT * FROM dogeusers WHERE id = ?");
            $select_profile->execute([$dogeuser_id]);
            if ($select_profile->rowCount() > 0) {
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            }
            ?>
        </div>
    </div>