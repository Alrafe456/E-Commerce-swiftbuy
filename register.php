<?php
session_start();
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = $_POST['password']; 
    $gender = $_POST['gender'];
    $birthDate = $_POST['birthDate'];
    $role = $_POST['role'];

    // Validate input
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
        die("Error: All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Error: Email already exists.");
    }
    $stmt->close();

    // Hash the password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user with hashed password
    $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, email, password, gender, birthDate, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("sssssss", $firstName, $lastName, $email, $hashedPassword, $gender, $birthDate, $role);

    if ($stmt->execute()) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        session_regenerate_id(true); // Secure session
        header("Location: welcome.php");
        exit();
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="index.css"> <!-- Ensure this path is correct -->
</head>
<body>

<div class="register-container">
    <h1>Register</h1>
    <form method="POST" action="">
        <div class="form-group">
            <input type="text" name="firstName" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <input type="text" name="lastName" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <select name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <input type="date" name="birthDate" required>
        </div>
        <div class="form-group">
            <select name="role" required>
                <option value="user">User </option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
    <div class="links">
        <p>Already have an account? <button class="btn" onclick="location.href='login.php'">Login</button></p>
    </div>
</div>

</body>
</html>