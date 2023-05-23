<?php
require '../koneksi.php';
$nim = $_GET['nim'];
$result = mysqli_query($conn, "DELETE FROM mahasiswa
WHERE nim='$nim'");
echo "<script>window.location.href = 'tampil_data.php';</script>";
?>