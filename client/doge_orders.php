<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Linkt to CSS -->
    <link rel="stylesheet" href="../doge_config.php">
    <title>Doge Orders</title>
</head>
<body>
    <!-- Header Section Starts -->
    <?php include '../includes/client_dogetopnavigation.php'; ?>
    <!-- Header Section Ends -->

    <div class="orders">
        <?php if($user_id == ''){
            echo '<p class="empty">Please login to see your orders</p>';
        } else {
            
        }
    </div>
</body>
</html>