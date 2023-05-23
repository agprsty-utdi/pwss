<?php

$host = 'mysql'; 
$username = 'admin'; 
$password = 'admin'; 
$dbname = 'pwss'; 

$conn = new mysqli($host, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

echo "Koneksi berhasil &#10003;";