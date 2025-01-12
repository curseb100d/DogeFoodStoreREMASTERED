<?php

include '../doge_config.php';

session_start();

if (isset($_SESSION['dogeuser_id'])) {
    $dogeuser_id = $_SESSION['dogeuser_id'];
} else {
    $dogeuser_id = '';
    header('location: ../index.php');
};

if (isset($_POST['delete'])) {
    $dogecart_id = $_POST['dogecart_id'];
    $delete_cart_item = $pdo->prepare("DELETE FROM dogecart WHERE id = ?");
    $delete_cart_item->execute([$dogecart_id]);
    $message[] = 'cart item deleted!';
}

if (isset($_POST['delete_all'])) {
    $delete_cart_item = $pdo->prepare("DELETE FROM dogecart WHERE dogeuser_id = ?");
    $delete_cart_item->execute([$dogeuser_id]);
    // header('location:cart.php');
    $message[] = 'deleted all from cart!';
}

if (isset($_POST['update_qty'])) {
    $dogecart_id = $_POST['dogecart_id'];
    $qty = $_POST['qty'];
    $update_qty = $pdo->prepare("UPDATE dogecart SET quantity = ? WHERE id = ?");
    $update_qty->execute([$qty, $dogecart_id]);
    $message[] = 'cart quantity updated';
}

$grand_total = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Linkt to CSS -->
    <link rel="stylesheet" href="../dogestyle.css">
    <title>Doge Cart</title>
</head>

<body>

    <section class="products">
        <?php
        $grand_total = 0;
        $select_cart = $pdo->prepare("SELECT * FROM dogecart WHERE dogeuser_id = ?");
        $select_cart->execute([$dogeuser_id]);
        if ($select_cart->rowCount() > 0) {
            while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <form action="" method="post" class="box">
                    <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
                    <a href="quick_view.php?pid=<?= $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
                    <button type="submit" class="fas fa-times" name="delete" onclick="return confirm('delete this item?');"></button>
                    <img src="../image_upload/<?= $fetch_cart['image']; ?>" alt="">
                    <div class="name"><?= $fetch_cart['brand']; ?></div>
                    <div class="flex">
                        <div class="price"><span>₱</span><?= $fetch_cart['price']; ?></div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['quantity']; ?>" maxlength="2">
                        <button type="submit" class="fas fa-edit" name="update_qty"></button>
                    </div>
                    <div class="sub-total"> sub total : <span>₱<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
                </form>
        <?php
                $grand_total += $sub_total;
            }
        } else {
            echo '<p class="empty">your cart is empty</p>';
        }
        ?>

        </div>

        <div class="cart-total">
            <p>cart total : <span>₱<?= $grand_total; ?></span></p>
            <a href="../client/doge_checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
        </div>

        <div class="more-btn">
            <form action="" method="post">
                <button type="submit" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" name="delete_all" onclick="return confirm('delete all from cart?');">delete all</button>
            </form>
            <a href="menu.php" class="btn">continue shopping</a>
        </div>
    </section>

</body>

</html>