<?php
require '../koneksi.php';
$kode_prodi = $_GET['kode_prodi'];
$result = mysqli_query($conn, "DELETE FROM prodi WHERE
kode_prodi='$kode_prodi'");
echo "<script>window.location.href = 'tampil_data.php';</script>";
?>