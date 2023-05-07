<?php

require_once "databases.php";
require_once "list_mahasiswa.php";


// Tutup koneksi database
$koneksi->close();
echo '<br/><br/>Koneksi ditutup &#x2717;';