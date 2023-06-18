<?php
require_once '../connect.php';
require_once '../utils.php';
$result = mysqli_query($conn, "SELECT * FROM costumer");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Costumer | View</title>
</head>

<body>
  <h3>List Costumers</h3>
  <a href="create.php">New Costumer</a>
  <br />
  <br />
  <table border="1">
    <tr>
      <td>Name</td>
      <td>Gender</td>
      <td>Mobile Number</td>
      <td>Address</td>
      <td>Created At</td>
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