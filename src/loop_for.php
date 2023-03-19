<?php

$loop_for = $_POST["loop_for"] ?? "off";
if ($loop_for == "on") {
    echo "- Perulangan dengan <strong>For</strong>: <br/><br/>";
    
    if ($nilai1 >= $nilai2) {
        echo "<h5>Nilai 1 lebih besar daripada Nilai 2</h5><br/>";
    }

    // Perulangan for
    for ($i = $nilai1; $i <= $nilai2; $i++) {
        echo "ke-". $i . ", ";
    }

    echo "<br/><br/>";
}
