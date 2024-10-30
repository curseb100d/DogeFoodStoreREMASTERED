<?php

include '../doge_config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Cloudflare -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Link to CSS -->
    <link rel="stylesheet" href="../dogestyle.css">
    <title>Doge Products</title>
</head>
<body>

    <!-- Doge Top Navigation -->
    <?php include '../includes/dogetopnavigation.php'?>

    <!-- Doge Forms -->
    <div class="row">
        <div class="column" style="background-color: #aaa;">
            <section class="add-products">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Brand</label>
                    <input type="text" required name="brand" maxlength="100">
                    <label>Flavor</label>
                    <input type="text" required name="flavor" maxlength="100">
                    <label>Price</label>
                    <input type="number" required name="price" onkeypress="if(this.value.length == 10) return false;">
                    <label>Category</label>
                    <select name="category" required>
                        <option value="" disabled selected>Select Category --</option>
                        <option value="Dog Food">Dog Food</option>
                        <option value="Dog Accessory">Dog Accessory</option>
                    </select>
                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp" required>
                    <input type="submit" value="add product" name="add_product">
                </form>
            </section>
        </div>
        <div class="column" style="background-color: #bbb;">
            <section class="show-products" style="padding-top: 0;">
                <div class="box-container">
                </div>
            </section>
        </div>
    </div>
</body>
</html>