<?php
require("includes/common.php");

// Redirects the user to the admin dashboard if logged in.
if (isset($_SESSION['email'])) {
    header('location: admin_cart.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Login | Life Style BD</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php include 'includes/header.php'; ?>
        <div id="content" style="background-image: linear-gradient(#fbfcfb 0%, #7cccf7 100%);">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="col-lg-4 col-md-6">
                    <img src="img\admin_login.png" alt="Admin Login">
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-3 col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>ADMIN LOGIN</h4>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i>Login to manage the store</i></p>
                                <form action="admin_login_submit.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Admin Email" autofocus="on" name="admin_email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                                    <?php if (isset($_GET['error'])) echo $_GET['error']; ?>
                                </form><br/>
                            </div>
                            <div class="panel-footer">
                                <p>Not an admin? <a href="login.php">User Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
    </body>
</html>
