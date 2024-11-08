<?php
session_start();

// Check if the 'order' session variable exists, if not, create it
if (!isset($_SESSION['order'])) {
    $_SESSION['order'] = array();
}

// Add the product to the order
$product = array(
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'price' => $_POST['price']
);
array_push($_SESSION['order'], $product);

// Return a success message
echo 'success';
?>
