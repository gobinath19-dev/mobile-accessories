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

    $email = $_POST['email'];
   

    // Inserting data into the database
    
    $sql = "INSERT INTO contact (email) VALUES ('$email')";

    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
