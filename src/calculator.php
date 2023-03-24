<?php

echo '<strong>Hasil Perhitungan dari Calculator.html</strong><br/>';

$nilai1 = $_POST["nilai1"];
$nilai2 = $_POST["nilai2"];
$operator = $_POST["operator"];

function calculator(int $nilai1, int $nilai2, string $operator) {
    switch ($operator) {
        case "tambah":
            return ["+", $nilai1 + $nilai2];
            break;
        case "kurang":
            return ["-", $nilai1 - $nilai2];
            break;
        case "kali":
            return ["X", $nilai1 * $nilai2];
            break;
        case "bagi":
            return ["/", $nilai1 / $nilai2];
            break;    
        default:
            return 0;
    }
}

$result = calculator($nilai1, $nilai2, $operator);
echo $nilai1.' '.$result[0].' '.$nilai2.' = '.$result[1];
echo '<br/><br/>';