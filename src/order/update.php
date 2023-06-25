<?php
require '../connect.php';

$id = $_GET['id'];

// Fetch order details
$order_query = "SELECT * FROM `order` WHERE id='$id'";
$order_result = mysqli_query($conn, $order_query);
$order = mysqli_fetch_assoc($order_result);

$customer_id = $order['costumer_id'];

// Fetch customer details
$customer_query = "SELECT id, name FROM costumer";
$customer_result = mysqli_query($conn, $customer_query);

// Fetch order items
$order_items_query = "SELECT * FROM order_item WHERE order_id='$id'";
$order_items_result = mysqli_query($conn, $order_items_query);
$order_items = mysqli_fetch_all($order_items_result, MYSQLI_ASSOC);

// Fetch product details
$product_query = "SELECT id, name, price, stock FROM product";
$product_result = mysqli_query($conn, $product_query);
$products = mysqli_fetch_all($product_result, MYSQLI_ASSOC);

$productPrices = array();
$productNames = array();

foreach ($products as $product) {
  $productPrices[$product['id']] = $product['price'];
  $productNames[$product['id']] = $product['name'];
}

function getStockProduct(mysqli $conn, int $id, int $quantity) {
  $product_query = "SELECT stock FROM product WHERE id = $id";
  $product_result = mysqli_query($conn, $product_query);
  $product = mysqli_fetch_array($product_result, MYSQLI_ASSOC);
  return ($product['stock'] >= 1) ? $product['stock']:$quantity;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Order</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="container">
    <h1 class="text-center mt-5">Update Order</h1>

    <form action="process_update.php" method="POST">
      <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">

      <div class="form-group">
        <label for="customer_id">Customer Name:</label>
        <select name="customer_id" class="form-control" required>
          <option value="">Select Customer</option>
          <?php
          while ($customer = mysqli_fetch_array($customer_result)) {
            $selected = ($customer['id'] == $customer_id) ? 'selected' : '';
            echo "<option value='" . $customer['id'] . "' $selected>" . $customer['name'] . "</option>";
          }
          ?>
        </select>
      </div>

      <table class="table" id="order_items">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price per Unit</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($order_items as $order_item) {
            $product_id = $order_item['product_id'];
            $quantity = $order_item['quantity'];
            $price_per_unit = $productPrices[$product_id];
          ?>
            <tr>
              <td>
                <select name="product_id[]" class="form-control" required>
                  <option value="">Select Product</option>
                  <?php
                  foreach ($products as $product) {
                    $selected = ($product['id'] == $product_id) ? 'selected' : '';
                    echo "<option value='" . $product['id'] . "' $selected>" . $product['name'] . "</option>";
                  }
                  ?>
                </select>
              </td>
              <td>
                <input type="number" name="price_per_unit[]" class="form-control" value="<?php echo $price_per_unit; ?>" min="0" readonly>
              </td>
              <td>
                <input type="number" name="quantity[]" class="form-control" value="<?php echo $quantity; ?>" min="1" max="<?php echo getStockProduct($conn, $product_id, $quantity);?>" onchange="calculateTotalPrice()" oninput="checkMaxQuantity(this)">
              </td> 
              <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeOrderItem(this)">Remove</button>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>

      <div class="form-group">
        <label for="total_price">Total Price:</label>
        <input type="text" id="total_price" name="total_price" class="form-control" value="<?php echo $order['total_price']; ?>" min="0" readonly>
      </div>

      <button type="button" class="btn btn-primary" onclick="addOrderItem()">Add Item</button>
      <input type="submit" class="btn btn-success" value="Update Order">
    </form>

    <script>
      $(document).on('change', 'select[name="product_id[]"]', function() {
        var selectedProductId = $(this).val();
        var pricePerUnitInput = $(this).closest('tr').find('input[name="price_per_unit[]"]');
        console.log(this);
        var productPrices = <?php echo json_encode($productPrices); ?>;
        var pricePerUnit = productPrices[selectedProductId];
        pricePerUnitInput.val(pricePerUnit);
        calculateTotalPrice();
      });

      function calculateTotalPrice() {
        var totalPriceInput = $('#total_price');
        var totalPrice = 0;
        var itemsCount = 0;

        $('table#order_items tbody tr').each(function() {
          var quantityInput = $(this).find('input[name="quantity[]"]');
          var pricePerUnitInput = $(this).find('input[name="price_per_unit[]"]');

          var quantity = parseInt(quantityInput.val());
          var pricePerUnit = parseFloat(pricePerUnitInput.val());

          if (!isNaN(quantity) && !isNaN(pricePerUnit)) {
            totalPrice += quantity * pricePerUnit;
            itemsCount++;
          }
        });

        if (itemsCount > 0) {
          totalPriceInput.val(totalPrice.toFixed(2));
        } else {
          totalPriceInput.val("0.00");
        }
      }

      function addOrderItem() {
        var table = document.getElementById("order_items");
        var row = table.insertRow(-1);
        var productCell = row.insertCell(0);
        var pricePerUnitCell = row.insertCell(1);
        var quantityCell = row.insertCell(2);
        var actionCell = row.insertCell(3);
        var selectHTML = '<select name="product_id[]" class="form-control" required>' +
          '  <option value="">Select Product</option>';
        var productNames = <?php echo json_encode($productNames); ?>;
        for (var key in productNames) {
          var value = productNames[key];
          selectHTML += `  <option value="${key}">${value}</option>`;
        }
        selectHTML += '</select>';
        productCell.innerHTML = selectHTML;
        pricePerUnitCell.innerHTML = '<input type="number" name="price_per_unit[]" class="form-control" value="0" min="0" readonly>';
        quantityCell.innerHTML = '<input type="number" name="quantity[]" class="form-control" value="1" min="1" max"<?php echo getStockProduct($conn, $product_id, $quantity);?>" onchange="calculateTotalPrice()" oninput="checkMaxQuantity(this)">';
        actionCell.innerHTML = '<button type="button" class="btn btn-danger btn-sm" onclick="removeOrderItem(this)">Remove</button>';
      }

      function checkMaxQuantity(input) {
        var maxQuantity = parseInt(input.getAttribute('max'));
        var quantity = parseInt(input.value);
        if (quantity > maxQuantity) {
          input.value = maxQuantity;
        }
      }

      function removeOrderItem(button) {
        var row = button.closest('tr');
        row.remove();
        calculateTotalPrice();
      }
    </script>
  </div>
</body>

</html>
