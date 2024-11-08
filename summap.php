<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
</head>
<body>
    <h1>Products</h1>
    <ul>
        <li>Product 1 - $10.99 <button onclick="buyProduct('Product 1', 10.99)">Buy</button></li>
        <li>Product 2 - $19.99 <button onclick="buyProduct('Product 2', 19.99)">Buy</button></li>
        <!-- Add more products as needed -->
    </ul>
    
    <div id="orderDetails">
        <!-- Order details will be displayed here -->
    </div>

    <script>
        function buyProduct(productName, price) {
            // Create or update order details
            var orderDetails = document.getElementById("orderDetails");
            var orderInfo = document.createElement("div");
            orderInfo.innerHTML = "<p>Product Name: " + productName + "</p><p>Price: " + price + "</p>";
            orderDetails.appendChild(orderInfo);
            
            // You can also add the product to the session or local storage for persistence
        }
    </script>
</body>
</html>
