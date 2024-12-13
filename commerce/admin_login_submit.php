<?php
require("includes/common.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
    $admin_email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    // Encrypt password for comparison (assuming password is hashed in the database)
    $hashed_password = md5($password); // Replace `md5` with your hashing algorithm if different

    // Query to check admin credentials
    $query = "SELECT id, email FROM admins WHERE email = '$admin_email' AND password = '$hashed_password'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_array($result);

        // Set session variables
        $_SESSION['email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['role'] = 'admin'; // Setting role to differentiate admin from user

        // Redirect to admin dashboard
        header('location: cart.php');
        exit;
    } else {
        // Redirect back to admin login page with error
        header('location: admin_login.php?error=Invalid email or password');
        exit;
    }
} else {
    // Redirect back to admin login page if accessed improperly
    header('location: cart.php');
    exit;
}
