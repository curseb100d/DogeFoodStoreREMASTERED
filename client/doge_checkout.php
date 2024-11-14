<?php

include '../doge_config.php';

session_start();

if (isset($_SESSION['dogeuser_id'])) {
    $dogeuser_id = $_SESSION['dogeuser_id'];
} else {
    $dogeuser_id = '';
    header('location: ../index.php');
};

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $method = $_POST['method'];
    $address = $_POST['address'];
    $total_products = $_POST['total_products'];
    $total_price = $_POST['total_price'];

    $check_cart = $pdo->prepare("SELECT * FROM dogecart WHERE dogeuser_id = ?");
    $check_cart->execute([$dogeuser_id]);

    if ($check_cart->rowCount() > 0) {

        if ($address == '') {
            $message[] = 'Please add your address!';
        } else {

            $insert_order = $pdo->prepare("INSERT INTO dogeorders(dogeuser_id, name, email, number, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
            $insert_order->execute([$dogeuser_id, $name, $number, $email, $method, $address, $total_products, $total_price]);

            $delete_cart = $pdo->prepare("DELETE FROM dogecart WHERE dogeuser_id = ?");
            $delete_cart->execute([$dogeuser_id]);

            $message[] = 'Order placed successfully';
        }
    } else {
        $message[] = 'Your cart is empty';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link to CSS -->
    <link rel="stylesheet" href="../dogestyle.css">
    <title>Doge Checkout</title>
</head>

<body>
    <!-- Doge Top Navigation -->
    <?php include '../includes/client_dogetopnavigation.php' ?>

    <form action="" method="POST">
        <div class="cart-items">
            <h3>Cart Items</h3>
            <?php
            $grand_total = 0;
            $cart_items[] = '';
            $select_cart = $pdo->prepare("SELECT * FROM dogecart WHERE dogeuser_id = ?");
            $select_cart->execute([$dogeuser_id]);
            if ($select_cart->rowCount() > 0) {
                while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                    $cart_items[] = $fetch_cart['brand'] . ' (' . $fetch_cart['price'] . ' x ' . $fetch_cart['quantity'] . ') - ';
                    $total_products = implode($cart_items);
                    $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
            ?>
                    <p><span class="name"><?= $fetch_cart['brand']; ?></span><span class="price">$<?= $fetch_cart['price']; ?> x <?= $fetch_cart['quantity']; ?></span></p>
            <?php
                }
            } else {
                echo '<p class="empty">Your cart is empty!</p>';
            }
            ?>
            <p class="grand-total"><span class="name">grand total :</span><span class="price">$<?= $grand_total; ?></span></p>
            <a href="doge_cart.php" class="btn">veiw cart</a>
        </div>

        <input type="hidden" name="total_products" value="<?= $total_products; ?>">
        <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
        <input type="hidden" name="name" value="<?= $fetch_profile['name'] ?>">
        <input type="hidden" name="email" value="<?= $fetch_profile['email'] ?>">
        <input type="hidden" name="number" value="<?= $fetch_profile['number'] ?>">
        <input type="hidden" name="address" value="<?= $fetch_profile['address'] ?>">

        <div class="user-info">
            <h3>your info</h3>
            <p><i class="fas fa-user"></i><span><?= $fetch_profile['name'] ?></span></p>
            <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email'] ?></span></p>
            <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number'] ?></span></p>
            <a href="update_profile.php" class="btn">update info</a>
            <h3>delivery address</h3>
            <p><i class="fas fa-map-marker-alt"></i><span><?php if ($fetch_profile['address'] == '') {
                                                                echo 'please enter your address';
                                                            } else {
                                                                echo $fetch_profile['address'];
                                                            } ?></span></p>
            <a href="../client/doge_userupdateaddress.php" class="btn">update address</a>
            <select name="method" class="box" required>
                <option value="" disabled selected>select payment method --</option>
                <option value="cash on delivery">cash on delivery</option>
                <option value="credit card">credit card</option>
            </select>
            <input type="submit" value="place order" class="btn <?php if ($fetch_profile['address'] == '') {
                                                                    echo 'disabled';
                                                                } ?>" style="width:100%; background:var(--red); color:var(--white);" name="submit">
        </div>

    </form>
</body>

</html>