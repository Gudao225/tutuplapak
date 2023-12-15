<?php
include "function.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="image/home/logo.png">
    <title>Tutuplapak</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        /* CSS untuk memindahkan kotak pencarian ke tengah navbar */
        .navbar-form .form-group {
            display: inline-block;
            float: none;
            vertical-align: top;
        }

        .navbar-form .btn {
            display: inline-block;
            float: none;
            vertical-align: top;
        }
    </style>
</head>
<body>
   
    <nav class="navbar navbar-default" style="padding: 2px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              
                <a class="navbar-brand" href="index.php" style="color: red; font-family: poppins;">
                    <img src="image/home/logo.png" alt="Logo" style="max-height: 130%; max-width: 100px; margin-top: -4px;">
                </a>
                <a class="navbar-brand" href="index.php" style="color: red; font-family: poppins;">
                <b style="margin-top: -10px;">Tutuplapak</b>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li>
                        <form action="index.php" method="post" class="navbar-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Cari barang" name="keyword" value="<?php echo isset($keyword) ? $keyword : ''; ?>" required>
                            </div>
                            <button type="submit" name="cari" class="btn btn-default">Cari!</button>
                        </form>
                    </li>
                    <li>
                        <a href="keranjang.php">
                            <i class='glyphicon glyphicon-shopping-cart'></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i>
                            <?php
                                if (isset($_SESSION['username'])) {
                                    $username = $_SESSION['username'];
                                    echo $username;
                                } else {
                                    echo "Akun";
                                }
                            ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                                if (isset($_SESSION['username'])) {
                                    echo "<li><a href='user_logout.php'>Logout</a></li>";
                                } else {
                                    echo 
                                    "<li><a href='user_login.php'>Login</a></li>
                                    <li><a href='register.php'>Register</a></li>";
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
