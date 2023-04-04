<?php

echo "5. aksesass.php<br/><br/>";

$praktikum = [
    "matakuliah" => "Pemrograman Web Server",
    "prodi" => "Teknik Informatika",
    "kode" => 8709,
];

echo "Cetak isi array assosiatif<br/>";
foreach ($praktikum as $k => $v) {
    echo " ".$k." : ".$v."<br/>";
}

echo "<br/>";
