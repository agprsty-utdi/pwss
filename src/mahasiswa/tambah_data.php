<?php
require '../koneksi.php';
$refProdi = mysqli_query($conn, "SELECT * FROM prodi");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,
initial-scale=1.0">
  <title>Tambah Data</title>
</head>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <td>Nim</td>
        <td>:</td>
        <td>
          <input type="text" name="nim" value="<?php
              $randomString = uniqid('', true);
              $randomString = substr($randomString, 0, 11);
              echo $randomString;
            ?>
            ">
        </td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td>
          <input type="text" name="nama">
        </td>
      </tr>
      <tr>
        <td>email</td>
        <td>:</td>
        <td>
          <input type="text" name="email">
        </td>
      </tr>
      <tr>
        <td>hp</td>
        <td>:</td>
        <td>
          <input type="text" name="hp">
        </td>
      </tr>
      <tr>
        <td>Prodi</td>
        <td>:</td>
        <td>
          <select name="prodi" id="">
            <?php
            while ($dataProdi = mysqli_fetch_array($refProdi)
              ) {
            ?>
              <option value="<?php echo $dataProdi['kode_prodi']; ?>"><?php echo $dataProdi['nama_prodi']; ?></option>
            <?php
            }
            ?>
          </select>

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
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $prodi = $_POST['prodi'];
    $result = mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, email, hp, prodi_id)
    VALUES ('$nim', '$nama', '$email', '$hp', '$prodi')");
    echo "<script>window.location.href = 'tampil_data.php';</script>";
  }
  ?>
</body>

</html>