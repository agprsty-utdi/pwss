<?php

echo '<strong>File cobareturn.php</strong><br/>';

function laporan(int $bulan) {
    if ($bulan < 3) {
        $status = 'Report belum tersedia';
    } else {
        $status = 'Report sudah tersedia';
    }
    return $status;
}

echo laporan(2);
echo '<br/><br/>';