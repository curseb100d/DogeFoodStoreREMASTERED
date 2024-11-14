<?php

include '../doge_config.php';

session_start();

if(isset($_SESSION['dogeuser_id'])){
    $dogeuser_id = $_SESSION['dogeuser_id'];
}else{
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
    <title>Doge User Profile</title>
</head>
<body>
<section class="user-details">

<div class="user">
   <?php
      
   ?>
   <img src="images/user-icon.png" alt="">
   <p><i class="fas fa-user"></i><span><span><?= $fetch_profile['name']; ?></span></span></p>
   <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number']; ?></span></p>
   <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email']; ?></span></p>
   <a href="update_profile.php" class="btn">update info</a>
   <p class="address"><i class="fas fa-map-marker-alt"></i><span><?php if($fetch_profile['address'] == ''){echo 'please enter your address';}else{echo $fetch_profile['address'];} ?></span></p>
   <a href="update_address.php" class="btn">update address</a>
</div>

</section>

</body>
</html>