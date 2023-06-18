<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,
initial-scale=1.0">
  <title>Product | Create</title>
</head>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <td>Product Name</td>
        <td>:</td>
        <td>
          <input type="text" name="name">
        </td>
      </tr>
      <tr>
        <td>Price</td>
        <td>:</td>
        <td>
          <input type="text" name="price">
        </td>
      </tr>
      <tr>
        <td>Stock</td>
        <td>:</td>
        <td>
          <input type="text" name="stock">
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
    require_once '../connect.php';
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $stock = $_POST['stock'];
      mysqli_query($conn, "INSERT INTO product VALUES(0, '$name', '$price', '$stock')");
      echo "<script>window.location.href = 'view.php';</script>";
    }
  ?>
  </body>
  </html>
</body>

</html>