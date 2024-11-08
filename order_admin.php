<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordered Address - Database Records</title>
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="admin.css">
    <style>

    </style>
</head>
<body>
    <div class="container">
        <h1>Ordered Address - Database Records</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Pin Code</th>
                    <th>Door No</th>
                    <th>Landmark</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Payment</th>
                    <th class="action-cell">Action</th>
                </tr>
            </thead>
            <tbody>
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

                // Check if phone number and name parameters are provided for deletion
                if (isset($_GET['phone']) && isset($_GET['name'])) {
                    // Prepare SQL statement to delete record with the provided phone number and name
                    $phone = $_GET['phone'];
                    $name = $_GET['name'];
                    $sql = "DELETE FROM address WHERE phone='$phone' AND name='$name'";

                    if ($conn->query($sql) === TRUE) {
                        // Successfully deleted
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                }

                // Fetch records from the database
                $sql = "SELECT product, name, phone, pincode, doorno, landmark, city, state, payment FROM address";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $counter = 1; // Initialize counter
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$counter."</td>"; // Display the counter as ID
                      
                        echo "<td>".$row["product"]."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo "<td>".$row["phone"]."</td>";
                        echo "<td>".$row["pincode"]."</td>";
                        echo "<td>".$row["doorno"]."</td>";
                        echo "<td>".$row["landmark"]."</td>";
                        echo "<td>".$row["city"]."</td>";
                        echo "<td>".$row["state"]."</td>";
                        echo "<td>".$row["payment"]."</td>";
                        echo "<td class='action-cell'><button class='delete-btn' onclick='confirmDelete(\"".$row["phone"]."\", \"".$row["name"]."\")'>Delete</button></td>"; // Delete button
                        echo "</tr>";
                        $counter++; // Increment counter
                    }
                } else {
                    echo "<tr><td colspan='9'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete(phone, name) {
            if (confirm("Are you sure you want to delete the user " + name + " with phone number: " + phone + "?")) {
                window.location.href = "order_admin.php?phone=" + phone + "&name=" + encodeURIComponent(name);
            }
        }
    </script>
</body>
</html>
