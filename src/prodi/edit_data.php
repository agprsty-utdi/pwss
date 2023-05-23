<?php
require '../koneksi.php';
$kode_prodi = $_GET['kode_prodi'];
$result = mysqli_query($conn, "SELECT * FROM prodi WHERE
kode_prodi='$kode_prodi'");
$dataProdi = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data</title>
</head>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <td>Kode Prodi</td>
        <td>:</td>
        <td>
          <input type="text" name="kode_prodi" value="<?php echo $dataProdi['kode_prodi'] ?>" readonly>
        </td>
      </tr>
      <tr>
        <td>Nama Prodi</td>
        <td>:</td>
        <td>

          <input type="text" name="nama_prodi" value="<?php echo $dataProdi['nama_prodi'] ?>">
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>

          <input type="submit" value="Simpan" name="submit">
        </td>
      </tr>
    </table>
  </form>
  <?php
  require '../koneksi.php';
  if (isset($_POST['submit'])) {
    $kode_prodi = $_POST['kode_prodi'];
    $nama_prodi = $_POST['nama_prodi'];
    $result = mysqli_query($conn, "UPDATE prodi SET
    kode_prodi='$kode_prodi',
    nama_prodi='$nama_prodi'
    WHERE kode_prodi='$kode_prodi'");
    echo "<script>window.location.href = 'tampil_data.php';</script>";
  }
  ?>
</body>

</html>