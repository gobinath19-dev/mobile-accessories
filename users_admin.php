<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users-registered</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <style>
   
    </style>
</head>
<body>
    <div class="container">
        <h1> Registered Users - Database Records</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if email parameter is set
                if(isset($_GET['email'])) {
                    // Connect to the database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Prepare SQL statement to delete user with the provided email
                    $email = $_GET['email'];
                    $sql = "DELETE FROM register WHERE email='$email'";

                    if ($conn->query($sql) === TRUE) {
                        header("Location: users_admin.php");
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }

                    $conn->close();
                } else {
                    
                }

                // Connect to the database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch records from the database
                $sql = "SELECT id, username, email FROM register";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $counter = 1; // Initialize counter
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$counter."</td>"; // Display the counter as ID
                        echo "<td>".$row["username"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td><button class='delete-btn' onclick='confirmDelete(\"".$row["email"]."\")'>Delete</button></td>"; // Delete button
                        echo "</tr>";
                        $counter++; // Increment counter
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
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
                window.location.href = "users_admin.php?email=" + email; // Redirect to delete script
            }
        }
    </script>
</body>
</html>
