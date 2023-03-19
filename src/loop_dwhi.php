<?php

$loop_dwhi = $_POST["loop_dwhi"] ?? "off";
if ($loop_dwhi == "on") {
    echo "- Perulangan dengan <strong>Do-While</strong>: <br/><br/>";
    
    // Perulangan do while
    $i = $nilai1;
    do {
        echo "ke-". $i . ", ";
        $i++;
    } while ($i <= $nilai2);
    
    echo "<br/><br/>";
}
