<?php
session_start();

if (isset($_POST["logout"])) {
    $_SESSION = array();
    session_destroy();
    header('location:'.$_SERVER["PHP_SELF"]);
} else if (isset($_POST["login"])) {
    htmlspecialchars($_POST["username"]);
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $_SESSION["id"] = 0;
        $_SESSION["value"] = 100;
        $_SESSION["username"] = $_POST["username"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <script src="../Bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="./CSS/main.css">
    <script src="./javascript/main.js"></script>
    <title>System</title>
</head>

<body class="">

    <!-- #menu -->
    <div class="container sticky-top">
        <div class="row flex-row-reverse">
            <div class="col-4"><?php

                                if (!isset($_SESSION["id"])) {
                                    echo
                                    '
    <form action="" method="post" class="row">
        <div class="col-4">
            <input class="col-12" type="text" name="username" id="username" required maxlength="32" placeholder="Username">
        </div>
        <div class="col-4">
            <input class="col-12" type="password" name="password" id="password" required maxlength="32" placeholder="Password">
        </div>
        <div class="col-4">
            <input class="col-12" type="submit" name="login" id="login" value="Login">
        </div>
    </form>
    ';
                                } else {
                                    echo
                                    '
    <form action="" method="post" class="row">                        
        <div class="col-4">
            <input class="col-12 logout" type="submit" name="logout" id="logout" value="Logout">
        </div>
    </form>
    ';
                                }
                                ?>

            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-6">
                        <a href="about.php">About</a>
                    </div>
                    <div class="col-6">
                        <a href="#">Contact</a>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-12">
                        <a href="system.php" class="logo">System</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Contact</h1>
            </div>
            <div class="col-12">
                <form action="post" class="panel row">
                    <div class="col-9">
                        <label for="email" class="col-12">E-mail:</label>
                        <input type="email" name="email" id="email" required class="col-8 form-input">
                    </div>
                    <div class="col-9">
                        <label for="message" class="col-12">Message:</label>
                        <textarea name="message" id=""message cols="30" rows="5" required class="col-8 form-input"></textarea>
                    </div>
                    <div class="col-9">
                        <input type="submit" name="submit" id="submit" value="Send" required class="col-4 form-input form-button">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>