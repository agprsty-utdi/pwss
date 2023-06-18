<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,
initial-scale=1.0">
  <title>Costumer | Create</title>
</head>

<body>
  <form action="" method="post">
    <table>
      <tr>
        <td>Full Name</td>
        <td>:</td>
        <td>
          <input type="text" name="name">
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>:</td>
        <td>
          <select name="gender">
            <option value="0">Male</option>
            <option value="1">Famale</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Mobile Number</td>
        <td>:</td>
        <td>
          <input type="text" name="mobile_number">
        </td>
      </tr>
      <tr>
        <td>Address</td>
        <td>:</td>
        <td>
          <input type="text" name="address">
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
      $gender = $_POST['gender'];
      $mobile_number = $_POST['mobile_number'];
      $address = $_POST['address'];
      mysqli_query($conn, "INSERT INTO costumer VALUES(0, '$name', '$gender', '$mobile_number', '$address')");
      echo "<script>window.location.href = 'view.php';</script>";
    }
    ?>
  </body>
  </html>
</body>

</html>