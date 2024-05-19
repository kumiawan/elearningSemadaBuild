<?php

$servername = 'localhost';
$username = 'root';  // Sesuaikan dengan username MySQL Anda
$password = '';      // Sesuaikan dengan password MySQL Anda
$dbname = 'semada_reborn';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: '.$e->getMessage();
}
