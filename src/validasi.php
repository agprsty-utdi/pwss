<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktik 4</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        $name_pesan = $email_pesan = "";
        $nama = $email = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nama"])) {
                $name_pesan = "Nama harus diisi";
            } else {
                $nama = htmlspecialchars($_POST["nama"]);
            }

            if (empty($_POST["email"])) {
                $email_pesan = "Email harus diisi";
            } else {
                $email = htmlspecialchars($_POST["email"]);
            }
        }
    ?>
    <h3>Form Input Data</h3><br>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nama: <input type="text" name="nama">
        <span class="error">* <?php echo $name_pesan ?></span>

        <br><br>

        Email: <input type="text" name="email">
        <span class="error">* <?php echo $email_pesan ?></span>

        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        echo "<h2>Yang kamu inputkan: </h2>";
        echo "Nama: ".$nama;
        echo "<br>";
        echo "Email: ".$email;
    ?>
</body>
</html>