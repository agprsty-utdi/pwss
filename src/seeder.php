<?php

require_once "connect.php";

$sql = file_get_contents("schema.sql");

// Menjalankan query SQL
if ($conn->multi_query($sql) === true) {
    echo "<script>console.log('Schema SQL berhasil disimpan ke database.');</script>";
} else {
    echo "<script>console.log(`Gagal menyimpan schema SQL: {$conn->error}`);</script>";
}