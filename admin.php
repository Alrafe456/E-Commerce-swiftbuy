<?php
session_start();

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css"> <!-- Link to your CSS file -->
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="navbar-logo">Admin Dashboard</a>
            <ul class="navbar-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="user_management.php">User  Management</a></li>
                <li><a href="product_management.php">Product Management</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="dashboard-container">
        <h1>Welcome to the Admin Dashboard</h1>
        <div class="stats">
            <h2>Dashboard Overview</h2>
            <p>Here you can manage users, products, and view reports.</p>
            <!-- Add statistics or quick links here -->
        </div>

        <div class="user-management">
            <h2>User Management</h2>
            <button onclick="location.href='add_user.php'" class="btn">Add User</button>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Populate with user data from the database -->
                    <?php
                    include("connect.php");
                    $stmt = $conn->prepare("SELECT id, firstName, lastName, email, role FROM users");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['firstName']}</td>
                                <td>{$row['lastName']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['role']}</td>
                                <td>
                                    <a href='edit_user.php?id={$row['id']}' class='btn'>Edit</a>
                                    <a href='delete_user.php?id={$row['id']}' class='btn'>Delete</a>
                                </td>
                              </tr>";
                    }
                    $stmt->close();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="product-management">
            <h2>Product Management</h2>
            <button onclick="location.href='add_product.php'" class="btn">Add Product</button>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Populate with product data from the database -->
                    <?php
                    $stmt = $conn->prepare("SELECT id, name, price, stock FROM products");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['stock']}</td>
                                <td>
                                    <a href='edit_product.php?id={$row['id']}' class='btn'>Edit</a>
                                    <a href='delete_product.php?id={$row['id']}' class='btn'>Delete</a>
                                </td>
                              </tr>";
                    }
                    $stmt->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>