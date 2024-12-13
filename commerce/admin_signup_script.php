<?php
require("includes/common.php");

$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$address = mysqli_real_escape_string($con, $_POST['address']);

$query = "SELECT * FROM admins WHERE email='$email'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$num = mysqli_num_rows($result);

if ($num != 0) {
    $m = "<span class='red'>Email Already Exists</span>";
    header('location: admin_signup.php?m1=' . urlencode($m));
    exit;
} else {
    $query = "INSERT INTO admins (name, email, password, contact, city, address) VALUES ('$name', '$email', '$password', '$contact', '$city', '$address')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $admin_id = mysqli_insert_id($con);
    $_SESSION['admin_email'] = $email;
    $_SESSION['admin_id'] = $admin_id;
    header('location: admin_login.php');
    exit;
}
?>
