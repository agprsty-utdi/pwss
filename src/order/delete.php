<?php
require '../connect.php';

// Mendapatkan ID pesanan yang akan dihapus
$id = $_GET['id'];

// Menghapus data order berdasarkan ID
$delete_order = mysqli_query($conn, "DELETE FROM `order` WHERE id='$id'");
$delete_order_item = mysqli_query($conn, "DELETE FROM `order_item` WHERE order_id='$id'");

if ($delete_order && $delete_order_item) {
  // Jika penghapusan berhasil, redirect ke halaman daftar pesanan
  echo "<script>window.location.href = 'index.php';</script>";
  exit();
} else {
  // Jika terjadi kesalahan, tampilkan pesan error
  echo "Failed to delete order.";
}
?>
