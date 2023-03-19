<?php


$loop_dwhi = $_POST["loop_dwhi"] ?? "off";
if ($loop_dwhi == "on") {
    echo "- Perulangan dengan <strong>While</strong>: <br/><br/>";    

    if ($nilai1 >= $nilai2) {
        echo "<h5>Nilai 1 lebih besar daripada Nilai 2</h5><br/>";
    }

    // Perulangan while
    $i = $nilai1;
    while ($i <= $nilai2) {
        echo "ke-". $i . ", ";
        $i++;
    }
    
    echo "<br/><br/>";
}

