<?php
require("includes/common.php");

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header('location: admin_login.php');
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $query = "DELETE FROM user_item WHERE item_id = $item_id AND status = 1";
    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: admin_cart.php');
}
?>
