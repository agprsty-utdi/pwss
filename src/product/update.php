<?php
require '../connect.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM product WHERE id='$id'");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Product | Update</title>
</head>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <td>Name</td>
        <td>:</td>
        <td>
          <input type="text" name="name" value="<?php echo $data['name'] ?>">
        </td>
      </tr>
      <tr>
        <td>Price</td>
        <td>:</td>
        <td>
          <input type="text" name="price" value="<?php echo $data['price'] ?>">
        </td>
      </tr>
      <tr>
        <td>Stock</td>
        <td>:</td>
        <td>
          <input type="text" name="stock" value="<?php echo $data['stock'] ?>">
        </td>
      </tr>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <input type="submit" value="Update" name="submit">
        </td>
      </tr>
    </table>
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    mysqli_query($conn, "UPDATE product SET name='$name', price='$price',
    stock='$stock' WHERE id='$id'");
    echo "<script>window.location.href = 'view.php';</script>";
  }
  ?>
</body>

</html>