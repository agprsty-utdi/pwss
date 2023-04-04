<?php

echo "6. foreachmulti.php<br/><br/>";

$praktikum = [
    [
        "matakuliah" => "Pemrograman Web Server",
        "prodi" => "Teknik Informatika",
        "kode" => 8709,
    ],
    [
        "matakuliah" => "Manajemen Sistem Informasi",
        "prodi" => "Sistem Informasi",
        "kode" => 5711,
    ],
    [
        "matakuliah" => "Pemrograman Server",
        "prodi" => "Manajemen Informatika",
        "kode" => 1279,
    ]
];

echo "Cetak isi array multidimensional<br/>";
foreach ($praktikum as $obj_k => $kuliah) {
    echo "Praktikum<br/>";
    foreach ($kuliah as $k => $v) {
        echo "- ".$k." : ".$v."<br/>";
    }
}

echo "<br/>";
