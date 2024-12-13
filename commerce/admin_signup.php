<?php
require("includes/common.php");

if (isset($_SESSION['email'])) {
    header('location: admin_login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Signup | Life Style BD</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="logborder" style="background-image: linear-gradient(#fbfcfb 0%, #7cccf7 100%);">
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <img src="img/s2.png" alt="Signup">
                </div>
                <div class="col-lg-4 col-lg-offset-3 col-md-6">
                    <h2>Admin Signup</h2>
                    <form action="admin_signup_script.php" method="POST">
                        <div class="form-group">
                            <input class="form-control" placeholder="Name" name="name" required pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Enter a valid Email" name="email" required>
                            <?php if (isset($_GET['m1'])) echo $_GET['m1']; ?>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" title="Password must be 8 characters including 1 uppercase letter, 1 lowercase letter, and numeric characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Contact (ex. 01601884441)" maxlength="11" name="contact" required pattern="^01[0-9]{9}$">
                            <?php if (isset($_GET['m2'])) echo $_GET['m2']; ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="City" name="city" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Address" name="address" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php"; ?>
</body>
</html>
