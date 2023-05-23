<?php
require '../koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM prodi");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,
initial-scale=1.0">
  <title>Tampil Data Prodi</title>
</head>

<body>
  <br/>
  <a href="tambah_data.php">Tambah Data</a>
  <br/>
  <br />
  <table border="1">
    <tr>
      <td>Kode Prodi</td>
      <td>Nama Prodi</td>
      <td>Aksi</td>
    </tr>
    <?php
    while ($data = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $data['kode_prodi']; ?></td>
        <td><?php echo $data['nama_prodi']; ?></td>
        <td>
          <a href="edit_data.php?kode_prodi=<?php
                                            echo $data['kode_prodi']; ?>">
            Edit
          </a>
          <a href="hapus_data.php?kode_prodi=<?php echo
                                              $data['kode_prodi']; ?>">
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