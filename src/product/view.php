<?php
require_once '../connect.php';
require_once '../utils.php';
$result = mysqli_query($conn, "SELECT * FROM product");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Product | View</title>
</head>

<body>
  <h3>List Products</h3>
  <a href="create.php">New Product</a>
  <br />
  <br />
  <table border="1">
    <tr>
      <td>Name</td>
      <td>Price</td>
      <td>Stock</td>
      <td>Created At</td>
      <td>Action</td>
    </tr>
    <?php
    while ($data = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['price']; ?></td>
        <td><?php echo $data['stock']; ?></td>
        <td><?php echo timeToString($data['created_at']); ?></td>
        <td>
          <a href="update.php?id=<?php echo $data['id']; ?>">
            Edit
          </a>
          <a href="delete.php?id=<?php echo $data['id']; ?>">
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