<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve email parameter from GET request if available
if(isset($_GET['email'])){
    $email = $_GET['email'];

    // SQL query to delete record
    $sql = "DELETE FROM contact WHERE email = '$email'";

    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        header("Location: contact_admin.php");
    } else {
        // Error in deletion
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch records from the database
$sql = "SELECT email FROM contact";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us - Database Records</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <style>
   
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact us - Database Records</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $counter = 1; // Initialize counter
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$counter."</td>"; // Display the counter as ID
                        echo "<td>".$row["email"]."</td>";
                        echo "<td><button class='delete-btn' onclick='confirmDelete(\"".$row["email"]."\")'>Delete</button></td>"; // Delete button
                        echo "</tr>";
                        $counter++; // Increment counter
                    }
                } else {
                    echo "<tr><td colspan='3'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete(email) {
            if (confirm("Are you sure you want to delete the user with email: " + email + "?")) {
                // You can perform AJAX request here to delete the record from the database
                // For the sake of simplicity, let's assume the page refreshes to delete the record
                window.location.href = "contact_admin.php?email=" + email; // Redirect to delete script
            }
        }
    </script>
</body>
</html>
