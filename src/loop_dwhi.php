<?php

$loop_whi = $_POST["loop_whi"] ?? "off";
if ($loop_whi == "on") {
    echo "- Perulangan dengan <strong>Do-While</strong>: <br/><br/>";
    
    // Perulangan do while
    $i = $nilai1;
    do {
        echo "ke-". $i . ", ";
        $i++;
    } while ($i <= $nilai2);
    
    echo "<br/><br/>";
}
