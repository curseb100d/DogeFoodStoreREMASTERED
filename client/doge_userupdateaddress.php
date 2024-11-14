<?php

include '../doge_config.php';

session_start();

if (isset($_SESSION['dogeuser_id'])) {
    $dogeuser_id = $_SESSION['dogeuser_id'];
} else {
    $dogeuser_id = '';
};

if (isset($_POST['submit'])) {

    $address = $_POST['flat'] . ', ' . $_POST['building'] . ', ' . $_POST['area'] . ', ' . $_POST['town'] . ', ' . $_POST['city'] . ', ' . $_POST['state'] . ', ' . $_POST['country'] . ' - ' . $_POST['pin_code'];

    $update_address = $pdo->prepare("UPDATE dogeusers set address = ? WHERE id = ?");
    $update_address->execute([$address, $dogeuser_id]);

    $message[] = 'address saved!';
}

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
    <section class="form-container">

        <form action="" method="post">
            <h3>your address</h3>
            <input type="text" class="box" placeholder="flat no." required maxlength="50" name="flat">
            <input type="text" class="box" placeholder="building no." required maxlength="50" name="building">
            <input type="text" class="box" placeholder="area name" required maxlength="50" name="area">
            <input type="text" class="box" placeholder="town name" required maxlength="50" name="town">
            <input type="text" class="box" placeholder="city name" required maxlength="50" name="city">
            <input type="text" class="box" placeholder="state name" required maxlength="50" name="state">
            <input type="text" class="box" placeholder="country name" required maxlength="50" name="country">
            <input type="number" class="box" placeholder="pin code" required max="999999" min="0" maxlength="6" name="pin_code">
            <input type="submit" value="save address" name="submit" class="btn">
        </form>

    </section>
</body>

</html>