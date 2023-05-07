<?php

require_once "databases.php";
var_dump('$email');

if (isset($_POST['simpan'])) {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $hp = $_POST['hp'];
  $query = "update mahasiswa set nama='$nama', email='$email', hp='$hp' where nim='$nim'";
  $hasil = mysqli_query($koneksi, $query);
  
  if ($hasil) {
    // header("location:index.php");
    echo "<script>window.location.href = 'index.php';</script>";
  } else {
    echo 'Gagal';
  }
}
