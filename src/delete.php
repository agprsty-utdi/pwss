<?php

require_once "databases.php";

if (isset($_GET['nim'])) {
  $nim = $_GET['nim'];
  $query = "DELETE FROM mahasiswa WHERE nim='$nim'";
  $hasil = mysqli_query($koneksi, $query);
  
  if ($hasil) {
    // header("location:index.php");
    echo "<script>window.location.href = 'index.php';</script>";
  } else {
    echo 'Gagal';
  }
}
