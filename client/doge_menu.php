<?php

include '../doge_config.php';
session_start();

include '../client/doge_addtocart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to CSS -->
    <link rel="stylesheet" href="../dogestyle.css">
    <title>Doge Orders</title>
</head>

<body>
    <div class="products">
        <div class="box-container">
            <?php
            $select_products = $pdo->prepare("SELECT * FROM dogeproducts");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
                while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <form action="" method="POST" class="box">
                        <input type="hidden" name="pid" value="<?= $fetch_products['dogeproducts_id']; ?>">
                        <input type="hidden" name="brand" value="<?= $fetch_products['brand']; ?>">
                        <input type="hidden" name="flavor" value="<?= $fetch_products['flavor']; ?>">
                        <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                        <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                        <button type="submit" class="shopping-cart" name="addtocart">Submit</button>
                        <img src="image_upload/<?= $fetch_products['image']; ?>" alt="">
                        <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
                        <div class="name"><?= $fetch_products['brand']; ?></div>
                        <div class="flex">
                            <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
                            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                        </div>
                    </form>
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </div>
</body>

</html>