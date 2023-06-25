<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product | Create</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container">
    <h1 class="mt-5">Create Product</h1>
    <form action="" method="post">
      <table>
        <tr>
          <td>Product Name</td>
          <td>:</td>
          <td>
            <input type="text" name="name" class="form-control">
          </td>
        </tr>
        <tr>
          <td>Price</td>
          <td>:</td>
          <td>
            <input type="number" name="price" class="form-control">
          </td>
        </tr>
        <tr>
          <td>Stock</td>
          <td>:</td>
          <td>
            <input type="number" name="stock" class="form-control">
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <button type="submit" class="btn btn-primary mt-3" name="submit">
              <i class="bi bi-check-circle-fill"></i> Simpan
            </button>
          </td>
        </tr>
      </table>
    </form>
  </div>

  <?php
    require_once '../connect.php';
    require_once '../utils.php';
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $stock = $_POST['stock'];
      $created_at = now();
      $updated_at = $created_at;
      mysqli_query($conn, "INSERT INTO product VALUES(0, '$name', '$price', '$stock', '$created_at', '$updated_at')");
      echo "<script>window.location.href = 'index.php';</script>";
    }
  ?>
</body>

</html>
