<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="admin_login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="post">
        <h3>ADMIN</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Username" id="username" name="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <input type="submit" value="Log In" class="btn"/>
  
    </form>

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
        $email = $_POST['username'];
        $password = $_POST['password'];

        // Query to check if user exists
        $sql = "SELECT * FROM admin WHERE username = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User authenticated, redirect to dashboard or welcome page
            $_SESSION['username'] = $email; // Store username in session for future use
            header("Location: admin_panel.html");
            exit;
        } else {
            // Invalid credentials, display error message
            echo '<p style="color: red;">Invalid username or password</p>';
        }
    }

    $conn->close();
    ?>
</body>
</html>
