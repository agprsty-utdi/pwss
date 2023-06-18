<?php
require '../connect.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM costumer WHERE id='$id'");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Costumer | Update</title>
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
        <td>Gender</td>
        <td>:</td>
        <td>
          <select name="gender">
              <option value="0" <?php echo ($data['gender'] == 0 ? "selected":"");?> >Male</option>
              <option value="1" <?php echo ($data['gender'] == 1 ? "selected":"");?> >Famale</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Mobile Number</td>
        <td>:</td>
        <td>
          <input type="text" name="mobile_number" value="<?php echo $data['mobile_number'] ?>">
        </td>
      </tr>
      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input type="text" name="address" value="<?php echo $data['address'] ?>">
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
    $gender = $_POST['gender'];
    $mobile_number = $_POST['mobile_number'];
    $address = $_POST['address'];
    mysqli_query($conn, "UPDATE costumer SET name='$name', gender='$gender',
    mobile_number='$mobile_number', address='$address' WHERE id='$id'");
    echo "<script>window.location.href = 'view.php';</script>";
  }
  ?>
</body>

</html>