<!DOCTYPE html>
<html>
<head>
	<title>Toko Roti - Supplier Bahan Baku</title>
</head>
<body>
	<h1>Toko Roti - Supplier Bahan Baku</h1>
	<p>Pilih bahan baku:</p>
	<form method="get">
		<select name="bahan">
			<option value="tepung_terigu">Tepung Terigu</option>
			<option value="tepung_tapioka">Tepung Tapioka</option>
			<option value="tepung_beras">Tepung Beras</option>
			<option value="margarin">Margarin</option>
			<option value="gula_putih">Gula Putih</option>
			<option value="telur_ayam">Telur Ayam</option>
		</select>
		<input type="submit" name="submit" value="Tampilkan Supplier">
	</form>

	<?php
	if (isset($_GET['submit'])) {
		$bahan = $_GET['bahan'];
		switch ($bahan) {
			case 'tepung_terigu':
				echo '<p>Supplier Tepung Terigu: CV. Abadi</p>';
				break;
			case 'tepung_tapioka':
			case 'margarin':
				echo '<p>Supplier Tepung Tapioka: CV. Mandiri Jaya</p>';
				break;
			case 'tepung_beras':
			case 'gula_putih':
				echo '<p>Supplier Tepung Beras: CV. Mulia</p>';
				break;
			case 'telur_ayam':
				echo '<p>Supplier Telur Ayam: CV. Unggas</p>';
				break;
			default:
				echo '<p>Silakan pilih bahan baku terlebih dahulu</p>';
				break;
		}
	}
	?>

</body>
</html>
