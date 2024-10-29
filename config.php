<?php
//Setting Up

$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = '';

try {
    //Connect Using PDO
    $pdo = new PDO("mysql:host=$HOSTNAME; dbname=$DATABASE", $USERNAME, $PASSWORD);

    //Set PDO Error Mode to Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>