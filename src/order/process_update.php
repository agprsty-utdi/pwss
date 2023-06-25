<?php
require '../connect.php';

$order_id = $_POST['order_id'];
$customer_id = $_POST['customer_id'];
$total_price = $_POST['total_price'];

// Mengupdate data order
$update_order_query = "UPDATE `order` SET costumer_id='$customer_id', total_price='$total_price' WHERE id='$order_id'";
mysqli_query($conn, $update_order_query);

// Menghapus semua order item yang terkait dengan order_id saat ini
$delete_order_items_query = "DELETE FROM order_item WHERE order_id='$order_id'";
mysqli_query($conn, $delete_order_items_query);

// Menambahkan kembali order item yang baru
$product_ids = $_POST['product_id'];
$quantities = $_POST['quantity'];
$price_per_units = $_POST['price_per_unit'];

for ($i = 0; $i < count($product_ids); $i++) {
    $product_id = $product_ids[$i];
    $quantity = $quantities[$i];
    $price_per_unit = $price_per_units[$i];

    // Mengambil stok produk sebelum pembaruan
    $get_product_query = "SELECT stock FROM product WHERE id='$product_id'";
    $result = mysqli_query($conn, $get_product_query);
    $row = mysqli_fetch_assoc($result);
    $previous_stock = $row['stock'];

    // Menghitung stok produk setelah pembaruan
    $updated_stock = $previous_stock - $quantity;

    // Memperbarui stok produk
    $update_product_query = "UPDATE product SET stock='$updated_stock' WHERE id='$product_id'";
    mysqli_query($conn, $update_product_query);

    // Menambahkan order item baru
    $insert_order_item_query = "INSERT INTO order_item (order_id, product_id, quantity, price_per_unit) VALUES ('$order_id', '$product_id', '$quantity', '$price_per_unit')";
    mysqli_query($conn, $insert_order_item_query);
}

echo "<script>window.location.href = 'index.php';</script>";
exit();
?>
