<?php

session_start();

if (isset($_SESSION['dogeuser_id'])) {
    $dogeuser_id = $_SESSION['dogeuser_id'];
} else {
    $dogeuser_id = '';
    header('location: ../index.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Linkt to CSS -->
    <link rel="stylesheet" href="../dogestyle.css">
    <title>Doge Orders</title>
</head>

<body>
    <!-- Header Section Starts -->
    <?php include '../includes/client_dogetopnavigation.php'; ?>
    <!-- Header Section Ends -->

    <section class="orders">

        <h1 class="title">your orders</h1>

        <div class="box-container">

            <?php
            if ($dogeuser_id == '') {
                echo '<p class="empty">please login to see your orders</p>';
            } else {
                $select_orders = $pdo->prepare("SELECT * FROM dogeorders WHERE dogeuser_id = ?");
                $select_orders->execute([$dogeuser_id]);
                if ($select_orders->rowCount() > 0) {
                    while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
            ?>
                        <div class="box">
                            <p>placed on : <span><?= $fetch_orders['placed_on']; ?></span></p>
                            <p>name : <span><?= $fetch_orders['name']; ?></span></p>
                            <p>email : <span><?= $fetch_orders['email']; ?></span></p>
                            <p>number : <span><?= $fetch_orders['number']; ?></span></p>
                            <p>address : <span><?= $fetch_orders['address']; ?></span></p>
                            <p>payment method : <span><?= $fetch_orders['method']; ?></span></p>
                            <p>your orders : <span><?= $fetch_orders['total_products']; ?></span></p>
                            <p>total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
                            <p> payment status : <span style="color:<?php if ($fetch_orders['payment_status'] == 'pending') {echo 'red';} else {echo 'green';}; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
                        </div>
            <?php
                    }
                } else {
                    echo '<p class="empty">no orders placed yet!</p>';
                }
            }
            ?>

        </div>

    </section>
</body>

</html>