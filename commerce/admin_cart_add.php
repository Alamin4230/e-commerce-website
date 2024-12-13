<?php
require("includes/common.php");

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header('location: admin_login.php');
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_GET['user_id']; // Pass the `user_id` from the interface.
    $query = "INSERT INTO user_item (user_id, item_id, status) VALUES ($user_id, $item_id, 1)";
    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: admin_cart.php');
}
?>
