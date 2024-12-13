<?php
require("includes/common.php");

// Redirect to login if the user is not an admin.
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header('location: admin_login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Cart | Life Style BD</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div style="background-image: linear-gradient(#fbfcfb 0%, #7cccf7 100%);">
        <div class="container-fluid" id="content">
            <h3 class="text-center">Admin Cart Management</h3>
            <div class="row decor_bg">
                <div class="col-md-6">
                    <h4>Manage Products</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM items";
                            $result = mysqli_query($con, $query) or die(mysqli_error($con));
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['name']}</td>
                                        <td>Rs {$row['price']}</td>
                                        <td>
                                            <a href='admin_cart_add.php?id={$row['id']}' class='btn btn-success'>Add to Cart</a>
                                            <a href='admin_cart_remove.php?id={$row['id']}' class='btn btn-danger'>Remove</a>
                                        </td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h4>User Cart List</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT user_item.user_id, items.id AS product_id, items.name, items.price 
                                      FROM user_item
                                      JOIN items ON user_item.item_id = items.id
                                      WHERE user_item.status = 1";
                            $result = mysqli_query($con, $query) or die(mysqli_error($con));
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>
                                        <td>{$row['user_id']}</td>
                                        <td>{$row['product_id']}</td>
                                        <td>{$row['name']}</td>
                                        <td>Rs {$row['price']}</td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
