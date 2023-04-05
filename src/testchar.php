<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktik 1</title>
</head>
<body>
    <?php
        $str = "Penggunaan tanda (<>) pada kata <b>AKAKOM</b>";
        echo htmlspecialchars($str);
    ?>
    <h3>1. testchar.php</h3><br>
    <p>Mengubah tanda <i dan > menggunakan method <i>htmlspecialchars()</i> dengan cara berikut: 
    &lt;b&gt;AKAKOM&lt;/b&gt;
    </p>

</body>
</html>