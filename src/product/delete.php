<?php
require '../connect.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM product
WHERE id='$id'");
echo "<script>window.location.href = 'index.php';</script>";
?>