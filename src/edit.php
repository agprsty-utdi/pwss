<!DOCTYPE html>
<html>

<head>
  <title>CRUD PHP dan MySQLi</title>
</head>

<body>
  <h2>CRUD DATA MAHASISWA</h2>
  <br />
  <a href="index.php">KEMBALI</a>
  <br />
  <br />
  <h3>EDIT DATA MAHASISWA</h3>
  <?php
  require_once "databases.php";

  $nim = $_GET['nim'];
  $data = mysqli_query($koneksi, "select * from mahasiswa where nim='$nim'");
  while ($d = mysqli_fetch_array($data)) {
  ?>

    <form method="post" action="update.php">
      <table>
        <tr>
          <td>Nama</td>
          <td>
            <input type="hidden" name="nim" value="<?php echo $d['nim']; ?>">
            <input type="text" name="nama" value="<?php echo $d['nama']; ?>">
          </td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" name="email" value="<?php echo $d['email']; ?>"></td>
        </tr>
        <tr>
          <td>No. Hp</td>
          <td><input type="text" name="hp" value="<?php echo $d['hp']; ?>"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="simpan" value="SIMPAN"></td>
        </tr>
      </table>
    </form>
  <?php
  }
  ?>
  </body>

</html>