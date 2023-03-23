<?php

echo '<strong>File passbyvalue.php</strong><br/>';

function jumlah($nilai) {
    $nilai++;
}

$input = 20;
$result = jumlah($input);

echo $input;
echo '<br/><br/>';