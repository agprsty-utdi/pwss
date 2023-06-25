<?php

require_once '../connect.php';
require_once '../utils.php';

$query = "SELECT order.id, order.total_price, order.created_at, costumer.name, order_item.quantity, order_item.price_per_unit, product.name as product_name
FROM `order`
JOIN `costumer` ON order.costumer_id = costumer.id
JOIN `order_item` ON order.id = order_item.order_id
JOIN `product` ON order_item.product_id = product.id
ORDER BY order.created_at DESC";

$get_query = mysqli_query($conn, $query);
$orders = [];
while ($data = mysqli_fetch_array($get_query)) {
  array_push($orders, $data);
}

$result = normalizerDataOrders($orders);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">  
  <style>
    .transaction-table {
        margin-top: 20px;
    }
  </style>
  <title>Transaction | View</title>
</head>

<body>
  <div class="container">
    <h1 class="text-center mt-5">Transaction Details</h1>
    <div class="text-right">
        <a href="create.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="transaction-table">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr class="text-center">
            <th>Actions</th>
            <th>Consumer</th>
            <th>Total Price</th>
            <th>Created At</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price per Unit</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $group) : ?>
            <?php $totalProducts = count($group['products']); ?>
            <tr>
              <td rowspan="<?php echo $totalProducts; ?>" class="text-center">
                <a href="update.php?id=<?php echo $group['id']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                <a href="delete.php?id=<?php echo $group['id']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
              </td>
              <td rowspan="<?php echo $totalProducts; ?>"><?php echo $group['name']; ?></td>
              <td rowspan="<?php echo $totalProducts; ?>"><?php echo formatRp($group['total_price']); ?></td>
              <td rowspan="<?php echo $totalProducts; ?>"><?php echo timeToString($group['created_at']); ?></td>
              <?php $firstProduct = true; ?>
              <?php foreach ($group['products'] as $product) : ?>
                  <?php if (!$firstProduct) : ?>
                      <tr>
                  <?php endif; ?>
                  <td><?php echo $product['product_name']; ?></td>
                  <td><?php echo $product['quantity']; ?></td>
                  <td><?php echo formatRp($product['price_per_unit']); ?></td>
                  <?php $firstProduct = false; ?>
                  </tr>
              <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>