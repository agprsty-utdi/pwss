<?php

$filename = $_FILES['fileToUpload']['name'];
$temp_file = $_FILES['fileToUpload']['tmp_name'];
$path = "public/";

$file_path = move_uploaded_file($temp_file, $path.$filename);

if ($file_path) {
    echo "Uploading file berhasil!<br/>";
    echo "Link file: <a href='".$path.$filename."'>".$filename."</a>";
} else {
    echo "Uploading file gagal!<br/>";
}
