<?php
require '../connect.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM costumer
WHERE id='$id'");
echo "<script>window.location.href = 'view.php';</script>";
?>