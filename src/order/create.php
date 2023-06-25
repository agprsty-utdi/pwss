<?php
require '../connect.php';
$costumers = mysqli_query($conn, "SELECT id, name FROM costumer");
$products = mysqli_query($conn, "SELECT id, name, price, stock FROM product");
$productPrices = array();
$productNames = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Create Order</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1 class="text-center mt-5">Create Order</h1>

    <form action="process_create.php" method="POST">
      <div class="form-group">
        <label for="customer_id">Customer Name:</label>
        <select name="customer_id" class="form-control" required>
          <option value="">Select Customer</option>
          <?php
          while ($data = mysqli_fetch_array($costumers)) {
          ?>
          <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
          <?php
          }
          ?>
        </select>
      </div>

      <table id="order_items" class="table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price per Unit</th>
            <th>Quantity</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <select name="product_id[]" class="form-control" required>
                <option value="">Select Product</option>
                <?php
                while ($data = mysqli_fetch_array($products)) {
                  # check stock
                  if ($data['stock'] > 0) {
                    $productPrices[$data['id']] = $data['price'];
                    $productNames[$data['id']] = $data['name'];
                ?>
                <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                <?php
                  }
                }
                ?>
              </select>
            </td>
            <td>
              <input type="number" name="price_per_unit[]" class="form-control" value="0" min="0" readonly>
            </td>
            <td>
              <input type="number" name="quantity[]" class="form-control" value="1" min="1" onchange="calculateTotalPrice(this)">
            </td>
            <td>
              <button type="button" class="btn btn-danger btn-sm" onclick="removeOrderItem(this)">Remove</button>
            </td>
          </tr>
          <!-- Add more rows for additional products -->
        </tbody>
      </table>

      <div class="form-group">
        <label for="total_price">Total Price:</label>
        <input type="text" id="total_price" name="total_price" class="form-control" value="0" min="0" readonly>
      </div>

      <div class="form-group">
        <button type="button" class="btn btn-primary" onclick="addOrderItem()">Add Item</button>
        <input type="submit" class="btn btn-success" value="Create Order">
      </div>
    </form>
  </div>

  <script>
    // Function to handle dynamic price per unit based on selected product
    $(document).on('change', 'select[name="product_id[]"]', function() {
      var selectedProductId = $(this).val();
      var pricePerUnitInput = $(this).closest('tr').find('input[name="price_per_unit[]"]');
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
      var removeCell = row.insertCell(3);
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
      quantityCell.innerHTML = '<input type="number" name="quantity[]" class="form-control" value="1" min="1" onchange="calculateTotalPrice(this)">';
      removeCell.innerHTML = '<button type="button" class="btn btn-danger btn-sm" onclick="removeOrderItem(this)">Remove</button>';
    }

    function removeOrderItem(button) {
      var row = button.closest('tr');
      row.remove();
      calculateTotalPrice();
    }
  </script>
</body>
</html>
