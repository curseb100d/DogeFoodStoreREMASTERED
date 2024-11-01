<?php

include '../doge_config.php';

// Update a doge product
// Get data from database from ID to display
$id = $_GET['updateid'];

try {
    // Prepare the SQL statement to fetch the dasta by ID
    $sql = "SELECT * FROM dogeproducts WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the record
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $brand = $row['brand'];
    $flavor = $row['flavor'];
    $price = $row['price'];
    $category = $row['category'];
    $image = $row['file'];

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

if (isset($_POST['submit'])) {
    $brand = $_POST['brand'];
    $flavor = $_POST['flavor'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['file'];

    $imagefilename = $image['name'];
    $imagefiletemp = $image['tmp_name'];

    $filename_separate = explode('.', $imagefilename);
    $file_extension = strtolower(end($filename_separate));

    $allowed_extensions = array('jpeg,', 'jpg', 'png');    

    try {
        // Prepare the SQL statement to update the data 
        $sql = "UPDATE dogeproducts SET brand = :brand, flavor = :flavor, price = :price, category = :category WHERE id = :id";
        $stmt = $pdo->prepare($sql);
    
        // Bind parameters to the SQL statement
        $stmt->bindParam(':brand', $brand);
        $stmt->bindParam(':flavor', $flavor);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':brand', $brand);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the update query
        $stmt->execute();
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
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
    <link rel="stylesheet" href="../dogestyle.css">
    <title>Doge Products</title>
</head>

<body>

    <!-- Doge Top Navigation -->
    <?php include '../includes/admin_dogetopnavigation.php' ?>

    <div class="row">
        <!-- Doge Forms -->
        <div class="column" id="forms">
            <form action="" method="POST" enctype="multipart/form-data">
                <label>Brand</label>
                <input type="text" required name="brand">

                <label>Flavor</label>
                <input type="text" required name="flavor">

                <label>Price</label>
                <input type="number" required name="price" onkeypress="if(this.value.length == 10) return false;">
                
                <label>Category</label>
                <select name="category" required>
                    <option value="" disabled selected>Select Category --</option>
                    <option value="Dog Food">Dog Food</option>
                    <option value="Dog Accessory">Dog Accessory</option>
                </select>
                <input type="file" name="file" required>
                <input type="submit" name="submit">
            </form>
        </div>
    </div>
</body>

</html>