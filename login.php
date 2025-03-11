<?php
session_start();
include("connect.php");

$error = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($email) || empty($password)) {
        $error = "Both fields are required.";
    } else {
        // Prepare and execute query
        $stmt = $conn->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
        if ($stmt === false) {
            error_log("Prepare failed: " . htmlspecialchars($conn->error));
            die("Internal server error. Please try again later.");
        }
        
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            error_log("Retrieved password hash: " . $row['password']); // Log the hash for debugging
            
            // Check if password is correct
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session variables
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['id'] = $row['id'];
                session_regenerate_id(true); // Secure session

                header("Location: welcome.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css"> 
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if ($error): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Sign up here</a>.</p>
    </div>
</body>
</html>