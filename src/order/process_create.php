<?php

require_once "../connect.php";
require_once "../utils.php";

$customer_id = $_POST['customer_id'];
$product_id = $_POST['product_id'];
$price_per_unit = $_POST['price_per_unit'];
$quantities = $_POST['quantity'];
$total_price = $_POST['total_price'];
$orders = [];
$created_at = now();
$updated_at = $created_at;

// Mengelompokkan detail item product
foreach ($product_id as $index => $productId) {
    $pricePerUnit = $price_per_unit[$index];
    $quantity = $quantities[$index];
    
    $order = (object)[
        'product_id' => $productId,
        'price_per_unit' => $pricePerUnit,
        'quantity' => $quantity
    ];
    
    $orders[] = $order;
}

// Membuat order terbaru
$query_create_order = "INSERT INTO `order` (id, costumer_id, total_price, created_at, updated_at) VALUES (0, '$customer_id', '$total_price', '$created_at', '$updated_at')";
$order = mysqli_query($conn, $query_create_order);
$order_id = mysqli_insert_id($conn);

// Membuat order item terbaru
foreach ($orders as $order) {
    $product_id = $order->product_id;
    $quantity = $order->quantity;
    $price_per_unit = $order->price_per_unit;
    
    // Insert order item baru
    $query_create_order_item = "INSERT INTO `order_item` (id, order_id, product_id, quantity, price_per_unit) VALUES (0, '$order_id', '$product_id', '$quantity', '$price_per_unit')";
    $result_create_order_item = mysqli_query($conn, $query_create_order_item);
    
    // Update stok produk
    $query_update_product_stock = "UPDATE `product` SET stock = stock - '$quantity' WHERE id = '$product_id'";
    $result_update_product_stock = mysqli_query($conn, $query_update_product_stock);
    
    // Periksa jika ada kesalahan dalam query
    if (!$result_create_order_item || !$result_update_product_stock) {
        echo "Error executing query: " . mysqli_error($conn);
    }
}

echo "<script>window.location.href = 'index.php';</script>";
