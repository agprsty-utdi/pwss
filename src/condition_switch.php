<?php

$con_swi = $_POST["con_swi"] ?? "off";
if ($con_swi == "on") {
    echo "- Kondisional dengan <strong>Switch Case</strong>:<br/><br/>";
    
    // Proses kondisi switch
    switch (true) {
        case ($nilai1 > $nilai2):
            echo "Nilai 1 lebih besar dari nilai 2";
            break;
        case ($nilai1 < $nilai2):
            echo "Nilai 2 lebih besar dari nilai 1";
            break;
        default:
            echo "Nilai 1 sama dengan nilai 2";
    }
    
    echo "<br/><br/>";
}

