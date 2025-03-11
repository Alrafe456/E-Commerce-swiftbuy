<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="navbar-logo">Our Shop</a>
            <ul class="navbar-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="profile.php">Profile</a></li> <!-- Profile link -->
                <li><a href="logout.php">Logout</a></li> <!-- Logout link -->
            </ul>
        </div>
    </nav>

    <div class="welcome-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>
        <p>Your role: <?php echo htmlspecialchars($_SESSION['role']); ?></p>
        
        <!-- Display success message if exists -->
        <?php if (isset($_SESSION['success'])): ?>
            <p class="success-message"><?php echo $_SESSION['success']; ?></p>
            <?php unset($_SESSION['success']); // Clear the message after displaying ?>
        <?php endif; ?>

        <p>Explore our amazing products and offers!</p>
        <a href="shop.php" class="btn">Start Shopping</a> <!-- Link to shop page -->
    </div>
</body>
</html>