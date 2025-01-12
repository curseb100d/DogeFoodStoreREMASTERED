<?php

include '../doge_config.php';

// Add Doge Product
$dogeproduct = 0;
$dogeimage = 0;

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
        // If doge product already exist
        // MySQL
        // $select_dogeproducts = $pdo->prepare("SELECT * FROM `dogeproducts` WHERE brand = ?");
        // PostgreSQL
        $select_dogeproducts = $pdo->prepare("SELECT * FROM dogeproducts WHERE brand = ?");
        $select_dogeproducts -> execute([$brand]);

        if($select_dogeproducts -> rowCount() > 0) {
            // $message[] = 'Woof! Doge product already exist';
            $dogeproduct = 1;
        } else {
            if(in_array($file_extension, $allowed_extensions)) {
                // If the image already exist
                $upload_image = '../image_upload/' . $imagefilename;

                if($upload_image > 2000000) {
                    // $message[] = 'Woof! The image is too big';
                    $dogeimage = 1;
                } else {
                    // Product and Image will be uploaded to database
                    move_uploaded_file($imagefiletemp, $upload_image);

                    // MySQL
                    // $sql = "INSERT INTO `dogeproducts` (brand, flavor, price, category, image) VALUES (:brand, :flavor, :price, :category, :image)";
                    // PostgreSQL
                    $sql = "INSERT INTO dogeproducts (brand, flavor, price, category, image) VALUES (:brand, :flavor, :price, :category, :image)";
    
                    // Prepare the statement
                    $stmt = $pdo->prepare($sql);
        
                    // Bind parameters
                    $stmt->bindParam(':brand', $brand);
                    $stmt->bindParam(':flavor', $flavor);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':category', $category);
                    $stmt->bindParam(':image', $upload_image);
        
                    // Execute the statement
                    $stmt->execute();
                }
            }
        } 
    } catch (PDOException $e) {
        // If an error occurs, display an error message
        die("Error: " . $e->getMessage());
    }
}

// Delete a Doge Product
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    try {
        // Delete images from local
        $delete_dogeproduct_image = $pdo->prepare("SELECT * FROM dogeproducts WHERE id = ?");
        $delete_dogeproduct_image->execute([$id]);
        $fetch_delete_image = $delete_dogeproduct_image->fetch(PDO::FETCH_ASSOC);
        unlink('../image_upload/'.$fetch_delete_image['image']);

        // Alternative
        // if ($fetch_delete_image && !empty($fetch_delete_image['image'])) {
        //     unlink('../image_upload/' . $fetch_delete_image['image']);
        // }

        // Prepare the SQL DELETE query with a placeholder
        $sql = "DELETE FROM dogeproducts WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Bind the ID parameter to the placeholder
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the Query
        $stmt->execute();
    } catch (PDOException $e) {
        // Handle any errors that occur during the election
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
        <!-- Doge Display -->
        <div class="column" id="display">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Brand</th>
                    <th>Flavor</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Image</th>
                </tr>
                <?php
                    // Fetch data from database
                    // MySQL
                    // $sql = "SELECT * FROM `dogeproducts`";
                    // PostgreSQL
                    $sql = "SELECT * FROM dogeproducts";
                    $stmt = $pdo -> query($sql);

                    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                        $id = $row['id'];
                        $brand = $row['brand'];
                        $flavor = $row['flavor'];
                        $price = $row['price'];
                        $category = $row['category'];
                        $image = $row['image'];

                        echo '
                            <tr>
                                <td>'.$id.'</td>
                                <td>'.$brand.'</td>
                                <td>'.$flavor.'</td>
                                <td>'.$price.'</td>
                                <td>'.$category.'</td>
                                <td><img src='.$image.' style="width: 100px;"/></td>
                                <td>
                                    <button><a href="doge_products_update.php?updateid='.$id.'">Update</a></button>
                                    <button><a href="doge_products.php?deleteid='.$id.'">Delete</a></button>
                                </td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>