<?php

$host = 'mysql'; 
$username = 'admin'; 
$password = 'admin'; 
$dbname = 'pwss'; 

$koneksi = new mysqli($host, $username, $password, $dbname);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

echo "Koneksi berhasil &#10003;";
