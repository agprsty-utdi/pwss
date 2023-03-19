<?php


$con_if = $_POST["con_if"] ?? "off";
if ($con_if == "on") {
    echo "- Kondisional dengan <strong>if/elseif/else</strong>: <br/><br/>";
    
    // Proses kondisi if/else
    if ($nilai1 > $nilai2) {
        echo "Nilai 1 lebih besar dari nilai 2";
    } elseif ($nilai1 < $nilai2) {
        echo "Nilai 2 lebih besar dari nilai 1";
    } else {
        echo "Nilai 1 sama dengan nilai 2";
    }

    echo "<br/><br/>";
}

