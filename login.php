<?php
session_start();

// Establish connection to MySQL database
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "project"; // Your MySQL database name

$conn = new mysqli($servername, $username, $password, $database);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if user exists
    $sql = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User authenticated, redirect to dashboard or welcome page
        $_SESSION['email'] = $email; // Store username in session for future use
        header("Location: index.html");
        exit;
    } else {
        // Invalid credentials, display error message
        echo "Invalid username or password";
    }
}

$conn->close();
?>
