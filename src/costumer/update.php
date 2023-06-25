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
  <title>Consumer | Update</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container">
    <h1 class="mt-5">Update Consumer</h1>
    <form action="" method="post">
      <table>
        <tr>
          <td>Name</td>
          <td>:</td>
          <td>
            <input type="text" name="name" value="<?php echo $data['name'] ?>" class="form-control">
          </td>
        </tr>
        <tr>
          <td>Gender</td>
          <td>:</td>
          <td>
            <select class="custom-select" name="gender">
                <option value="0" <?php echo ($data['gender'] == 0 ? "selected":"");?> >Male</option>
                <option value="1" <?php echo ($data['gender'] == 1 ? "selected":"");?> >Famale</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Mobile Number</td>
          <td>:</td>
          <td>
            <input type="text" name="mobile_number" value="<?php echo $data['mobile_number'] ?>" class="form-control">
          </td>
        </tr>
        <tr>
          <td>Address</td>
          <td>:</td>
          <td>
            <input type="text" name="address" value="<?php echo $data['address'] ?>" class="form-control">
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
    $gender = $_POST['gender'];
    $mobile_number = $_POST['mobile_number'];
    $address = $_POST['address'];
    $updated_at = now();
    mysqli_query($conn, "UPDATE costumer SET name='$name', gender='$gender',
    mobile_number='$mobile_number', address='$address', updated_at='$updated_at' WHERE id='$id'");
    echo "<script>window.location.href = 'index.php';</script>";
  }
  ?>
</body>

</html>