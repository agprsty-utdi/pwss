<?php
require_once '../connect.php';
$result = mysqli_query($conn, "SELECT * FROM costumer");
$query = "SELECT o.id, c.name, p.name
          FROM `order` AS o
          JOIN costumer c ON o.costumer_id = c.id
          JOIN order_item AS io ON o.id = io.order_id
          JOIN product p ON io.product_id = p.id";
$data = mysqli_query($conn, $query);
var_dump(mysqli_fetch_array($data));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Orders | View</title>
</head>

<body>
  <h3>List Orders</h3>
  <a href="create.php">New Order</a>
  <br />
  <br />
  <table border="1">
    <tr>
      <td>Name</td>
      <td>Gender</td>
      <td>Mobile Number</td>
      <td>Address</td>
      <td>Action</td>
    </tr>
    <?php
    while ($data = mysqli_fetch_array($result)) {
      $isGender = ($data['gender'] == 0) ? "Male" : "Famale";
    ?>
      <tr>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $isGender; ?></td>
        <td><?php echo $data['mobile_number']; ?></td>
        <td><?php echo $data['address']; ?></td>
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