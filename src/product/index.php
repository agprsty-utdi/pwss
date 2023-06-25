<?php
require_once '../connect.php';
require_once '../utils.php';
$result = mysqli_query($conn, "SELECT * FROM product ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product | View</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container">
    <h3 class="text-center mt-5">List Products</h3>
    <div class="text-right mb-3">
      <a href="create.php" class="btn btn-primary">
        <i class="bi bi-plus"></i> New Product
      </a>
    </div>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr class="text-center">
          <th>Name</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php
      while ($data = mysqli_fetch_array($result)) {
      ?>
        <tr>
          <td><?php echo $data['name']; ?></td>
          <td><?php echo $data['price']; ?></td>
          <td><?php echo $data['stock']; ?></td>
          <td><?php echo timeToString($data['created_at']); ?></td>
          <td class="text-center">
            <a href="update.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">
              <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">
              <i class="bi bi-trash"></i> Hapus
            </a>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>
</body>

</html>
