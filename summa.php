<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
</head>
<body>
    <h1>My Orders</h1>
    <h2>Order Details</h2>
    <?php
    // Check if product information is passed in the URL
    if (isset($_GET['product_name']) && isset($_GET['price'])) {
        $product_name = $_GET['product_name'];
        $price = $_GET['price'];
        echo "<p>Product Name: $product_name</p>";
        echo "<p>Price: $price</p>";
        // You can also add the product to the session or local storage for persistence
    } else {
        echo "<p>No product information found.</p>";
    }
    ?>
</body>
</html>
