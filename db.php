<?php
$host = "localhost";
$dbname = "instituto";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;port=3306;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
