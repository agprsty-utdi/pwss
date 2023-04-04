<?php

echo "4. akseswhile.php<br/><br/>";

$nama[0] = "Linda";
$nama[1] = "Santi";
$nama[2] = "Susan";
$nama[3] = "Mila";
$nama[4] = "Ayu";
$i = 0;
while ($i < count($nama)) {
    echo $nama[$i]."<br>";
    $i++;
}

echo "<br/>";
