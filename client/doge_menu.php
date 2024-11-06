<?php

include '../doge_config.php';
session_start();

include '../includes/client_dogetopnavigation.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to CSS -->
    <link rel="stylesheet" href="../doge_config.php">
    <title>Doge Orders</title>
</head>
<body>
    <div class="products">
        <div class="box-container">
            <?php
                $select_products = $pdo->prepare("SELECT * FROM dogeproducts");
                $select_products->execute();
                if($select_products->rowCount() > 0){
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
            ?>
            <form action="" method="POST" class="box">
                <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                <input type="hidden" name="brand" value="<?= $fetch_products['brand']; ?>">
                <input type="hidden" name="flavor" value="<?= $fetch_products['flavor']; ?>">
                <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
            </form>
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>