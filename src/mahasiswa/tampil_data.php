<?php
require '../koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Tampil Data Mahasiswa</title>
</head>

<body>
  <br />
  <a href="tambah_data.php">Tambah Data</a>
  <br />
  <br />
  <table border="1">
    <tr>
      <td>Nim</td>
      <td>Nama</td>
      <td>email</td>
      <td>hp</td>
      <td>Prodi</td>
      <td>Aksi</td>
    </tr>
    <?php
    while ($data = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $data['nim']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><?php echo $data['hp']; ?></td>

        <td>
          <?php
          $queryProdi = mysqli_query($conn, "SELECT * FROM prodi
          WHERE kode_prodi=" . $data['prodi_id']);
          $dataProdi = mysqli_fetch_assoc($queryProdi);
          echo $dataProdi['nama_prodi'];

          ?></td>
        <td>
          <a href="edit_data.php?nim=<?php echo $data['nim']; ?>">
            Edit
          </a>
          <a href="hapus_data.php?nim=<?php echo $data['nim']; ?>">
            Hapus
          </a>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>