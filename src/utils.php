<?php

require_once '../connect.php';
$adasda = $conn;

function now() {
  return round(microtime(true) * 1000);
};

function timeToString(int $time) {
  $currentDate = round($time / 1000);
  return date("Y-m-d H:i:s", $currentDate);
};


// require_once "./disconnect.php";
