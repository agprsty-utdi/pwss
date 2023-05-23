<?php
require '../koneksi.php';
$nim = $_GET['nim'];
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$dataMahasiswa = mysqli_fetch_assoc($result);
$refProdi = mysqli_query($conn, "SELECT * FROM prodi");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Edit Data</title>
</head>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <td>Nim</td>
        <td>:</td>
        <td>
          <input type="text" name="nim" value="<?php echo $dataMahasiswa['nim'] ?>" readonly>
        </td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td>

          <input type="text" name="nama" value="<?php echo $dataMahasiswa['nama'] ?>">
        </td>
      </tr>
      <tr>
        <td>email</td>
        <td>:</td>
        <td>
          <input type="text" name="email" value="<?php echo $dataMahasiswa['email'] ?>">
        </td>
      </tr>
      <tr>
        <td>hp</td>
        <td>:</td>
        <td>
          <input type="text" name="hp" value="<?php echo $dataMahasiswa['hp'] ?>">
        </td>
      </tr>
      <tr>
        <td>Prodi</td>
        <td>:</td>
        <td>
          <select name="prodi" id="">
            <?php
            while ($dataProdi = mysqli_fetch_array($refProdi)) {
            ?>
              <option value="<?php echo $dataProdi['kode_prodi']; ?>" <?php if (
                                                                        $dataMahasiswa['prodi_id'] ==
                                                                        $dataProdi['kode_prodi']
                                                                      ) {
                                                                        echo "selected";
                                                                      } ?>>
                <?php echo $dataProdi['nama_prodi']; ?></option>
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
    $result = mysqli_query($conn, "UPDATE mahasiswa SET
    nama='$nama', email ='$email',
    hp='$hp', prodi_id='$prodi' WHERE nim='$nim'");    
    echo "<script>window.location.href = 'tampil_data.php';</script>";
  }
  ?>
</body>

</html>