<?php

require_once '../connect.php';

function now()
{
  return round(microtime(true) * 1000);
};

function timeToString(int $time)
{
  $currentDate = round($time / 1000);
  return date("Y-m-d H:i:s", $currentDate);
};

function formatRp($amount) {
  return 'Rp. ' . number_format($amount, 0, ',', '.');
}

function normalizerDataOrders(array $data) {
  $results = [];

  foreach ($data as $item) {
    $id = $item['id'];

    if (!isset($results[$id])) {
      $results[$id] = [
        'id' => $id,
        'name' => $item['name'],
        'total_price' => $item['total_price'],
        'created_at' => $item['created_at'],
        'products' => [],
      ];
    }

    $products = [
      'product_name' => $item['product_name'],
      'quantity' => $item['quantity'],
      'price_per_unit' => $item['price_per_unit'],
    ];

    $results[$id]['products'][] = $products;
  }

  $results = array_values($results);
  return $results;
}

// require_once "./disconnect.php";
