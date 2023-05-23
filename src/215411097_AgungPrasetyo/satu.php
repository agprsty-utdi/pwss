<!DOCTYPE html>
<html>
<head>
	<title>Soal nomor 2 - UTS</title>
</head>
<body>
	<h1>Form hitung menghitung persamaan berikut : A2 + B * C.</h1>
	<h1>Mohon inputkan:</h1>
	<form method="post">
		<label>Nilai A:</label>
		<input type="number" name="a" required><br><br>
		<label>Nilai B:</label>
		<input type="number" name="b" required><br><br>
		<label>Nilai C:</label>
		<input type="number" name="c" required><br><br>
		<input type="submit" name="hitung" value="Hitung"><br><br>
	</form>

	<?php
  function agungprasetyo($a, $b, $c) {
    return pow($a, 2) + ($b * $c);
  }

	if (isset($_POST['hitung'])) {
		$a = $_POST['a'];
		$b = $_POST['b'];
		$c = $_POST['c'];

    echo "Hasil operasi $a<sup>2</sup> + $b * $c = ".agungprasetyo($a, $b, $c)."\n";
	}
	?>
</body>
</html>
