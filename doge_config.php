<!-- MySQL PHPMyAdmin Version -->
<?php
// //Setting Up

// $HOSTNAME = 'localhost';
// $USERNAME = 'root';
// $PASSWORD = '';
// $DATABASE = 'dogedatabase';

// try {
//     //Connect Using PDO
//     $pdo = new PDO("mysql:host=$HOSTNAME; dbname=$DATABASE", $USERNAME, $PASSWORD);

//     //Set PDO Error Mode to Exception
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("Connection failed: " . $e->getMessage());
// }
?>

<!-- PostgreSQL Version -->
<?php
//Setting Up

$HOSTNAME = 'localhost';
$USERNAME = 'postgres';
$PASSWORD = 'password';
$DATABASE = 'dogedatabase';

try {
    //Connect Using PDO
    $pdo = new PDO("pgsql:host=$HOSTNAME; dbname=$DATABASE", $USERNAME, $PASSWORD);

    //Set PDO Error Mode to Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>