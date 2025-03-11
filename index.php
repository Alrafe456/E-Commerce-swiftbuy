<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="index.css"> <!-- Ensure this path is correct -->
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="navbar-logo">Our Shop</a>
            <ul class="navbar-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>

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