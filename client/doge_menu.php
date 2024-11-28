<?php

include '../doge_config.php';

session_start();

if (isset($_SESSION['dogeuser_id'])) {
    $dogeuser_id = $_SESSION['dogeuser_id'];
} else {
    $dogeuser_id = '';
};

// if(!isset($_SESSION['username'])){
//     header('location: doge_userlogin.php');
// }

if (isset($_POST['addtocart'])) {

    if ($dogeuser_id == '') {
        header('location:doge_userlogin.php');
    } else {

        $pid = $_POST["pid"];
        $brand = $_POST["brand"];
        $flavor = $_POST["flavor"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        $qty = $_POST["qty"];

        $check_cart_numbers = $pdo->prepare("SELECT * FROM dogecart WHERE brand = ? AND dogeuser_id = ?");
        $check_cart_numbers->execute([$brand, $dogeuser_id]);

        if ($check_cart_numbers->rowCount() > 0) {
            $message[] = 'Already added to cart';
        } else {
            $insert_cart = $pdo->prepare("INSERT INTO dogecart(dogeuser_id, pid, brand, flavor, price, image, quantity) VALUES(?,?,?,?,?,?,?)");
            $insert_cart->execute([$dogeuser_id, $pid, $brand, $flavor, $price, $image, $qty]);
            $message[] = 'Added to Cart!';
        }
    }
}

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
    <link rel="stylesheet" href="../css/dogestyle.css">
    <title>Doge Orders</title>
</head>

<body>

    <!-- Doge Top Navigation -->
    <?php include '../includes/client_dogetopnavigation.php'; ?>

    <!-- Products -->
    <section class="products" id="products">
        <div class="middle-text">
            <h4>Doge Products</h4>
            <h2>Latest Doge Foods</h2>
        </div>

        <div class="products-content">
            <?php
            $select_products = $pdo->prepare("SELECT * FROM dogeproducts");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
                while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <form action="" method="POST" class="box">
                        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                        <input type="hidden" name="brand" value="<?= $fetch_products['brand']; ?>">
                        <input type="hidden" name="flavor" value="<?= $fetch_products['flavor']; ?>">
                        <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                        <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                        <div class="row">
                            <img src="../image_upload/<?= $fetch_products['image']; ?>" alt="">
                            <div class="in-text1">
                                <h3><?= $fetch_products['brand']; ?></h3>
                                <h3><?= $fetch_products['category']; ?></h3>
                            </div>
                            <div class="in-text2">
                                <div class="price">
                                    <h6>P<?= $fetch_products['price']; ?></h6>
                                </div>
                                <div class="s-btnn">
                                    <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                                </div>
                            </div>
                            <div class="in-button3">
                                <div class="s-btnn">
                                    <button type="submit" class="shopping-cart" name="addtocart">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </section>
</body>

</html>