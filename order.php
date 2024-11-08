<?php
// Establishing connection to MySQL database
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "project"; // Your MySQL database name

$conn = new mysqli($servername, $username, $password, $database);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = $_POST['product'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pincode = $_POST['pincode'];
    $doorno = $_POST['doorno'];
    $street = $_POST['street'];
    $landmark = $_POST['landmark'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $payment = $_POST['payment'];

    // Inserting data into the database
    $sql = "INSERT INTO address (product, name, phone, pincode, doorno, street, landmark, city, state, payment) VALUES ('$product','$name', '$phone', '$pincode','$doorno','$street','$landmark','$city','$state','$payment')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: success.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
