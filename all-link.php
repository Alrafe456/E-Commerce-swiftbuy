<?php
// Start the session to manage access control
session_start();

// Check if the user is logged in and is the superuser (root)
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");  // Redirect if the user is not logged in or not a superuser
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Links - Admin</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
        }
    </style>
</head>
<body>

    <header class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <div class="text-2xl font-bold text-indigo-600">
            <a href="admin_dashboard.php">Swift Buy 🛒 - Admin</a>
        </div>
        <div>
            <a href="logout.php" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Logout</a>
        </div>
    </header>

    <div class="container mx-auto p-6 mt-10 bg-white shadow-md rounded-lg max-w-4xl">
        <h1 class="text-3xl font-semibold text-center mb-6">All Available Links for Superuser</h1>
        <ul class="space-y-4">
            <!-- Manually adding links here -->
            <li><a href="admin_dashboard.php" class="text-indigo-600 hover:text-indigo-800">Admin Dashboard</a></li>
            <li><a href="user_dashboard.php" class="text-indigo-600 hover:text-indigo-800">User Dashboard</a></li>
            <li><a href="view_orders.php" class="text-indigo-600 hover:text-indigo-800">View Orders</a></li>
            <li><a href="admin_dashboard.php#products" class="text-indigo-600 hover:text-indigo-800">Manage Products</a></li>
            <li><a href="profile.php" class="text-indigo-600 hover:text-indigo-800">Profile</a></li>
            <li><a href="cart.php" class="text-indigo-600 hover:text-indigo-800">Shopping Cart</a></li>
            <li><a href="checkout.php" class="text-indigo-600 hover:text-indigo-800">Checkout</a></li>
            <li><a href="index.php" class="text-indigo-600 hover:text-indigo-800">Index</a></li>
            <li><a href="login.php" class="text-indigo-600 hover:text-indigo-800">Login</a></li>
            <li><a href="register.php" class="text-indigo-600 hover:text-indigo-800">Registration</a></li>
            <li><a href="info.php" class="text-indigo-600 hover:text-indigo-800">Info</a></li>
            <li><a href="marks.php" class="text-indigo-600 hover:text-indigo-800">Marks</a></li>
        </ul>
    </div>

</body>
</html>
