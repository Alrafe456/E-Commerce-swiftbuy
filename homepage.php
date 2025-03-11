<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to Our Shop!</h1>
        <p>Join us to explore amazing products and offers.</p>
        
        <div class="options">
            <h2>Sign In</h2>
            <p>If you already have an account, please sign in.</p>
            <button class="btn" onclick="location.href='login.php'">Sign In</button>
        </div>

        <div class="options">
            <h2>Sign Up</h2>
            <p>Don't have an account? Create one now!</p>
            <button class="btn" onclick="location.href='register.php'">Sign Up</button>
        </div>
    </div>
</body>
</html>