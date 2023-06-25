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
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container">
    <h1 class="mt-5">Update Product</h1>
    <form action="" method="post">
      <table>
        <tr>
          <td>Name</td>
          <td>:</td>
          <td>
            <input class="form-control" type="text" name="name" value="<?php echo $data['name'] ?>">
          </td>
        </tr>
        <tr>
          <td>Price</td>
          <td>:</td>
          <td>
            <input class="form-control" type="number" name="price" value="<?php echo $data['price'] ?>">
          </td>
        </tr>
        <tr>
          <td>Stock</td>
          <td>:</td>
          <td>
            <input class="form-control" type="number" name="stock" value="<?php echo $data['stock'] ?>">
          </td>
        </tr>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <button type="submit" class="btn btn-primary mt-3" name="submit">
              <i class="bi bi-check-circle-fill"></i> Update
            </button>
          </td>
        </tr>
      </table>
    </form>
  </div>
  <?php
  require_once "../utils.php";
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $updated_at = now();
    mysqli_query($conn, "UPDATE product SET name='$name', price='$price',
    stock='$stock', updated_at='$updated_at' WHERE id='$id'");
    echo "<script>window.location.href = 'index.php';</script>";
  }
  ?>
</body>

</html>