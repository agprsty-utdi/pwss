<?php

echo '<strong>File passbyref.php</strong><br/>';

function jumlah2(&$nilai) {
    $nilai++;
}

$input = 20;
$result = jumlah2($input);

echo $input;
echo '<br/><br/>';